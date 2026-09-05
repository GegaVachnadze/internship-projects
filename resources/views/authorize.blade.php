<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('auth.authorization') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl border border-slate-100">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">{{ __('auth.welcome') }}</h1>
            <p class="text-sm text-slate-500 mt-1">{{ __('auth.enter_details') }}</p>
        </div>

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="userInput" class="block text-sm font-semibold text-slate-700 mb-1.5">{{ __('auth.username_or_email') }}</label>
                <input type="text" id="userInput" name="login" value="{{ old('login') }}" placeholder="{{ __('auth.placeholder_login') }}"
                    class="w-full px-4 py-3 text-sm bg-slate-50 border @error('login') border-rose-500 bg-rose-50 @else border-slate-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">

                @error('login')
                <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="passwordInput" class="block text-sm font-semibold text-slate-700 mb-1.5">{{ __('auth.password') }}</label>
                <input type="password" id="passwordInput" name="password" placeholder="{{ __('auth.placeholder_password') }}"
                    class="w-full px-4 py-3 text-sm bg-slate-50 border @error('password') border-rose-500 bg-rose-50 @else border-slate-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">

                @error('password')
                <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/25 transition-all active:scale-[0.98]">
                <a href="/admin-panel">{{ __('auth.login') }}</a>
            </button>

            <div class="text-center text-sm text-slate-500 pt-2">
                {{ __('auth.forgot_password_q') }} <a href="{{ url('/forgot-password') }}" class="text-indigo-600 font-semibold hover:underline">{{ __('auth.recover') }}</a>
            </div>

            <div class="text-center text-sm text-slate-500 pt-2">
                {{ __('auth.no_account') }} <a href="{{ url('/register') }}" class="text-indigo-600 font-semibold hover:underline">{{ __('auth.register') }}</a>
            </div>

        </form>
    </div>

</body>

</html>