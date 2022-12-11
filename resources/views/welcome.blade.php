
@extends('layouts.auth')

@section('content')

<div class="">
    <div class="px-6 py-4">
        <h4 style="font-size: 3rem; color: gray;" class="mb-4">Welcome Back</h4>

        <p style="font-size: 1.2rem;margin-bottom:15px;">You can subscribe any of the below RSS feeds</p>
        @foreach($rss_feeds as $feed)
            <div class="" style="margin: 0 0 10px;">
                <form action="{{ route('subscribe') }}" method="post">
                    @csrf
                    <input type="hidden" name="url" value="{{ $feed }}">
                    <div style="display:flex; justify-content: space-between; align-items:center;border-bottom: 1px solid #ccc; padding: 10px 0;">
                        <p style="font-size: 1rem;margin: 0 0 7px;">{{ $feed }}</p>
                        <button type="submit" class="subscribe__btn custom__btn">Subscribe</button>
                    </div>
                </form>
            </div>
        @endforeach

        @if(count($feeds) > 0)
            <h3 style="margin: 4rem 0 1rem;">Here is your feed list: </h3>
            @foreach($feeds as $feed)
                <div class="p-6 feed" style="margin: 0 0 5px; border: 1px solid #ddd; border-radius: 1rem; ">
                    <a href="{{ 'feed/'.$feed->public_id }}" class="feed__link" style="font-size: 2rem;">{{ $feed->title }}</a>
                    <p class="text-sm text-gray-400" style="margin: 0 0 5px;">Story Count: {{ $feed->story_count }}</p>

                    <form action="{{ route('unsubscribe') }}" method="post">
                        @csrf
                        <input type="hidden" name="public_id" value="{{ $feed->public_id }}">
                        <button type="submit" class="unsubscribe__btn custom__btn">Unsubscribe</button>
                    </form>

                </div>
            @endforeach
        @else
            <h3 style="font-size: 2rem;margin: 2rem 0 0" class="text-center">No Feeds Added Yet </h3>
        @endif
    </div>

</div>
@endsection
