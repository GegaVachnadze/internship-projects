<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function visit(): View
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function edit(): View
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    public function update(ProfileRequest $request): RedirectResponse
    {
        $user = User::findOrFail(Auth::id());

        $data = $request->validated();


        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
            unset($data['current_password']);
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('profile-photos', 'public');
        }

        $user->update($data);

        return redirect()->back();
    }
}
