<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FeedList;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Log;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        // Session::flush();
        // Auth::logout();

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $validator = $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if($validator) {
            $user = User::create([
                'email' => $validator['email'],
                'password' => Hash::make($validator['password'])
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->intended('/')->withSuccess('Signed in');
            }

        }else{
            return back()->with('error', 'There was an error.');
        }
    }

}
