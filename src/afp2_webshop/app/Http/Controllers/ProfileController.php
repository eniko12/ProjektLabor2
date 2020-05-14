<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){
        if(!Auth::check())
            abort(403);
        return AppHelper::viewWithGuestId('profile.profile', ['user'=>Auth::user()]);
    }

    public function edit(){
        if(!Auth::check())
            abort(403);
        return AppHelper::viewWithGuestId('profile.editprofile', ['user'=>Auth::user()]);
    }

    public function update(Request $request){
        if(!Auth::check())
            abort(403);
        $user = Auth::user();
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->phone=$request->get('phone');
        $user->date_of_birth=$request->get('dateofbirth');
        $user->save();
        $user->refresh();
        Auth::user()->refresh();
        return redirect()->route('profile');
    }
}
