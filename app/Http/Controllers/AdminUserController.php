<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'title' => 'Users',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'title' => 'Create User'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'image' => 'image|nullable|max:2048'
        ]);
        
        $validateData['password'] = bcrypt($validateData['password']);
        
        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('profile');
        }

        User::create($validateData);

        return redirect('/dashboard/users')->with('success', 'New user has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dashboard.users.edit', [
            'title' => 'Edit User',
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username,' . $id,
            'email' => 'required|email:dns|unique:users,email,' . $id ,
            // 'password' => 'nullable|min:5|max:255',
            'is_admin' => 'required|boolean',
            'image' => 'image|file|max:2048'
        ]);

        // if($validateData['password']){
        //     $validateData['password'] = bcrypt($validateData['password']);
        // }else{
        //     unset($validateData['password']);
        // }

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $validateData['image'] = $request->file('image')->store('profile');
        }

        User::where('id', $id)->update($validateData);

        return redirect('/dashboard/users')->with('success', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hasCourses = User::find($id)->courses()->exists();

        if($hasCourses){
            return redirect('/dashboard/users')->with('error', 'User cannot be deleted because it has trainings!');
        }

        $user = User::findOrFail($id);

        if($user->image){
            Storage::delete($user->image);
        }

        User::destroy($id);
        return redirect('/dashboard/users')->with('success', 'User has been deleted!');
    }
}
