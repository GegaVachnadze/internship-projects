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
        }

        unset($data['current_password']);

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');

            $path = 'profile-photos/' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destination = storage_path('app/public/' . $path);

            copy($file->getRealPath(), $destination);

            $user->photo = $path;

            unset($data['photo']);
        } else {
            unset($data['photo']);
        }

        $user->update($data);

        $user->save();

        return back();
    }
}
