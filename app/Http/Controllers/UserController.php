<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vedmant\FeedReader\Facades\FeedReader;
use Illuminate\Support\Facades\Http;
use App\Models\FeedList;
use Log;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $feeds = $user->feeds;

        $rss_feeds = [
            'https://www.theguardian.com/world/rss',
            'https://www.nasa.gov/rss/dyn/breaking_news.rss',
            'http://feeds.foxnews.com/foxnews/latest',
            'https://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml',
            'https://rss.politico.com/playbook.xml'
        ];

        foreach ($feeds as $value) {
            $rss_feeds = $this->removeElement($rss_feeds, $value->feed_url);
        }

        return view('welcome')->with([
            'rss_feeds' => $rss_feeds,
            'feeds' => $feeds,
        ]);
    }

    /**
     * Get feed details
     */
    public function feed($id)
    {
        $user = Auth::user();
        $feed = FeedList::where('public_id', $id)->where('user_id', $user->id)->first();

        if (!$feed) {
            return view('feed')->with([
                'error' => true,
                'message' => 'Feed URL not found'
            ]);
        }

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/xml',
            ])->get($feed->feed_url);

            if ($response->status() == 200) {

                $xml = simplexml_load_string($response);
                $json = json_encode($xml);
                $array = json_decode($json,TRUE);

                $title = $array['channel']['title'] ?? 'Default title';
                $stories = $array['channel']['item'] ?? [];

                $feed->story_count = count($stories);
                $feed->save();

                return view('feed')->with([
                    'title' => $title,
                    'stories' => $stories,
                ]);
            }else{
                return view('feed')->with([
                    'title' => null,
                    'stories' => [],
                ]);
            }

        }catch (\Exception $e) {
            Log::error('Error fetching RSS feed: ' . $e->getMessage());
        }


    }

    /**
     * Subscribe user to a feed
     */
    public function subscribe(Request $request){
        $validator = $this->validate($request, [
            'url' => 'required|string'
        ]);

        $user = Auth::user();

        $feed = FeedList::create([
            'user_id' => $user->id,
            'feed_url' => $validator['url'],
            'public_id' => Str::uuid()
        ]);

        $data = $this->getFeedData($validator['url']);

        return back();
    }

    /**
     * Unsubscribe user from a feed
     */
    public function unsubscribe(Request $request){
        $validator = $this->validate($request, [
            'public_id' => 'required|string'
        ]);

        $user = Auth::user();

        $feed = FeedList::where('user_id', $user->id)->where('public_id', $validator['public_id'])->first();
        if ($feed) {
            $feed->delete();
        }

        return back();
    }

    private function removeElement($array,$value) {
        if (($key = array_search($value, $array)) !== false) {
          unset($array[$key]);
        }
       return $array;
    }

    private function getFeedData($feed_url){
        try {

            $response = Http::withHeaders([
                'Content-Type' => 'application/xml',
            ])->get($feed_url);

            if ($response->status() == 200) {

                $xml = simplexml_load_string($response);
                $json = json_encode($xml);
                $array = json_decode($json,TRUE);
                // $array = collect($xml);

                $feed = FeedList::where('feed_url', $feed_url)->first();
                if ($feed) {
                    $feed->title = $array['channel']['title'] ?? null;
                    $feed->story_count = count($array['channel']['item']) ?? null;
                    $feed->save();
                    return [ 'error' => false];
                }else{
                    return [ 'error' => true];
                }

            }else{
                return [ 'error' => true];
            }

        }catch (\Exception $e) {
            Log::error('Error fetching RSS feed: ' . $e->getMessage());
            return [ 'error' => true];
        }
    }

}
