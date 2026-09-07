<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;

class PasswordResetController extends Controller
{
    public function showLinkRequestForm(): View
    {
        return view('forgot-password');
    }

    public function sendResetLink(ForgotPasswordRequest $request): RedirectResponse
    {
        $status = Password::sendResetLink($request->only('email'));

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request, string $token): View
    {
        return view('reset-password', [
            'token' => $token,
            'email' => $request->query('email')
        ]);
    }

    public function reset(ResetPasswordRequest $request): RedirectResponse
    {

        $credentials = $request->validated();

        $status = Password::reset(
            $credentials,
            function (\App\Models\User $user, $password): void {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('authorize')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
