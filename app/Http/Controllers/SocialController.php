<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;


class SocialController extends Controller
{
    public function githubLogin()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
        $user = Socialite::driver('github')->user();

        $account = User::where('email',$user->email)->first();

        if( !$account ){
            $account = User::create([
                'email'    => $user->email,
                'name'     => $user->nickname,
                'password' => bcrypt('coding10.com')
            ]);
        }

        Auth::login($account);

        return redirect('/');
    }

    public function qqLogin()
    {
        return Socialite::driver('qq')->redirect();
    }

    public function qqCallback()
    {
        $user = Socialite::driver('qq')->user();

        dd($user);

//        $account = User::where('email',$user->email)->first();
//
//        if( !$account ){
//            $account = User::create([
//                'email'    => $user->email,
//                'name'     => $user->nickname,
//                'password' => bcrypt('coding10.com')
//            ]);
//        }
//
//        Auth::login($account);

        //return redirect('/');
    }
}
