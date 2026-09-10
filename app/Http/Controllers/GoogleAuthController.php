<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'username' => $googleUser->getName()
                    ?: Str::before($googleUser->getEmail(), '@'),
                'email' => $googleUser->getEmail(),
                'password' => bcrypt(Str::random(32)),
            ]);
        }

        Auth::login($user);

        request()->session()->regenerate();

        return redirect('/admin-panel');
    }
}