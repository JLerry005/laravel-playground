<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
// use Illuminate\Http\Request\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {

        // store avatar
        // dd($request->user());
        
        $path = $request->file('avatar')->store('avatars', 'public');
        // dd($path);
        auth()->user()->update([ 'avatar' => $path]);

        // dd(auth()->user());

        return redirect(route('profile.edit'))->with('message', 'Avatar is Changed');


        // return back()->with('message','Avatar is changed.');
    }
}
