<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function index  (User $user, $following)
    {
        if($following != 'follower' && $following != 'following')
        {
            return redirect(route('profile', $user->username));
        }

        return view('users.following',[
            'user'=> $user,
            'follows'=> $following == 'follower' ? $user->followers : $user->follows,
        ]);
    }
    public function store  (Request $request, User $user)
    {
        // ini kondisi pakai if
    // if(Auth::user()->hasFollow($user)){
    //     Auth::user()->unfollow($user);
    // }
    // else{
    //     Auth::user()->follow($user);
    // }

    // ini kondisi pakai ?
    Auth::user()->hasFollow($user) ? Auth::user()->unfollow($user) : Auth::user()->follow($user);
    return back()->with('success','you are follow the user');
    }

}
