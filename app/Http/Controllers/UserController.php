<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\user\UpdateProfileRequest;

class UserController extends Controller
{
    public function edit(){

        return view('user.edit')->with('user', Auth::user());
    }

    public function update(UpdateProfileRequest $request){
        
        // dd($request->all());
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        Session()->flash('success', 'Profile sucess updated');

        return redirect()->back();
    }

    public function index(){

        return view('user.index')->with('users', User::all());
    }

    public function makeAdmin(User $user){

        $user->role = 'admin';

        $user->save();

        Session()->flash('success', $user->name . ' is admin Now');

        return redirect(route('users.index'));

    }
}
