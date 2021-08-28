<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __invoke  (User $user, $following)
    {
        // if ($following == 'following')
        // {
        //     $follows = $user->follows;
        // }
        // else
        // {
        //     $follows = $user->followers;
        // }
        if($following != 'follower' && $following != 'following')
        {
            return redirect(route('profile', $user->username));
        }

        return view('users.following',[
            'user'=> $user,
            'follows'=> $following == 'follower' ? $user->followers : $user->follows,
        ]);
    }

}
