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

        $account = User::where('qq_id',$user->id)->first();

        if( !$account ){
            $driver = 'qq';
            return view('social.add_email',compact('user','driver'));
        }

        Auth::login($account);

        //return redirect('/');
    }

    public function addEmail()
    {
        $user = User::create([
            'email'    => request()->email,
            'name'     => request()->user_name,
            'qq_id'    => request()->qq_id,
            'password' => bcrypt('coding10.com')
        ]);

        Auth::login($user);

        return redirect('home');
    }

    public function wechatLogin()
    {
        return Socialite::driver('wechat')->redirect();
    }

    public function wechatCallback()
    {
        $user = Socialite::driver('wechat')->user();
        $account = User::firstOrNew([
            'wechat_id' => $user->id
        ],[
            'name'   => $user->nickname,
            'wechat_id' => $user->id,
            'avatar'    => $user->avatar
        ]);

        Auth::login($account);

        return redirect('/');
    }
}
