<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateProfileController extends Controller
{
    public function edit  ()
    {
        return view('users.edit');
    }

    public function update  (Request $request)
    {
        $attr = $request->validate([
            'name' => ['string','min:3','max:191','required'],
            'email' => ['email','string','min:3','max:191','required'],
            'username' => ['required','alpha_num','unique:users,username,'. auth()->id()],
        ]);

        auth()->user()->update($attr);

        return redirect()
            ->route('profile',auth()->user()->username)
            ->with('message','your profile has been updated'); 
    }
}
