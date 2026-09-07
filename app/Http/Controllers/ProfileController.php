<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function visit(): View
    {
        return view('profile');
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
        }

        unset($data['current_password']);

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $data['photo'] = $request->file('photo')->store('profile-photos', 'public');
        } else {
            unset($data['photo']);
        }

        $user->update($data);

        return back()->with('success', 'პროფილი წარმატებით განახლდა!');
    }
}
