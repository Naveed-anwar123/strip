<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $me = Auth::user();
      //  echo $user->id;
        //dd($me);

        $is_edit_profile = (Auth::id() == $user->id) ? true : false;
  //      dd($is_edit_profile);
        $is_follow_button = !$is_edit_profile && !$me->isFollowing($user);
        return view('profile', ['user' => $user, 'is_edit_profile' => $is_edit_profile, 'is_follow_button' => $is_follow_button]);
    }

}
