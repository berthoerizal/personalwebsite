<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        $title = "Register";
        return view('register.index', ['title' => $title]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|min:3|max:255|unique:users',
            'password' => 'required|min:6|max:255',
            'password_confirmation' => 'required|same:password'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['picture'] = "profiledefault.png";
        $user = User::create($validatedData);

        if (!$user) {
            session()->flash('error', 'Data fail to register.');
            return redirect('/register');
        } else {
            session()->flash('success', 'Data success to register, please login.');
            return redirect('/login');
        }
    }
}
