<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        return view('profiles.edit', [
            'title' => 'Update Profile',
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|max:255,' . auth()->id(),
            'username' => 'required|min:3|max:255|unique:users,username,' . auth()->id(),
            'email' => 'required|email:dns|unique:users,email,' . auth()->id(),
            'image' => 'image|nullable|max:2048' 
        ]);

        if($request->file('image')){
            if(auth()->user()->image && file_exists(storage_path('app/public/' . auth()->user()->image))){
                Storage::delete('public/' . auth()->user()->image);
            }
            $attr['image'] = $request->file('image')->store('profile');
        }

        auth()->user()->update($attr);

        return redirect('/profile/edit')->with('success', 'Profile has been updated!');
    }
}
