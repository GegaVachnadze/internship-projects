<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class Registration extends Controller
{
    public function ShowRegistrationForm()
    {
        return view('register');
    }


    public function register(RegisterRequest $request)
    {
        dd("Hello World");

        $user = User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));


        Auth::login($user);

        return redirect()->back()->with('show_verify_modal', true);
    }
}
