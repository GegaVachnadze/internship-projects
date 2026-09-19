<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('auth.authorization') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl border border-slate-100">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">{{ __('auth.welcome') }}</h1>
            <p class="text-sm text-slate-500 mt-1">{{ __('auth.enter_details') }}</p>
        </div>

        @if (session('status'))
        <div class="mb-4 p-4 text-sm text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-xl font-medium text-center">
            {{ session('status') }}
        </div>
        @endif

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
                {{ __('auth.login') }}
            </button>

            <a href="{{ route('google.login') }}" class="btn btn-outline-dark w-100 fw-medium py-2 mb-3 d-flex align-items-center justify-content-center gap-2">
                <svg width="18" height="18" viewBox="0 0 24 24">
                    <path fill="#EA4335" d="M12 5c1.6 0 3 .6 4.1 1.6l3.1-3.1C17.3 1.7 14.8 1 12 1 7.5 1 3.7 3.6 1.9 7.3l3.7 2.9C6.5 7.2 9 5 12 5z" />
                    <path fill="#4285F4" d="M23.5 12.3c0-.8-.1-1.6-.2-2.3H12v4.5h6.5c-.3 1.5-1.1 2.8-2.4 3.7l3.7 2.9c2.2-2 3.7-5 3.7-8.8z" />
                    <path fill="#FBBC05" d="M5.6 14.8c-.2-.7-.4-1.5-.4-2.3s.2-1.6.4-2.3L1.9 7.3C.7 9.7 0 10.8 0 12s.7 2.3 1.9 4.7l3.7-2.9z" />
                    <path fill="#34A853" d="M12 23c3.2 0 6-1.1 8-3l-3.7-2.9c-1.1.7-2.5 1.2-4.3 1.2-3 0-5.5-2.2-6.4-5.2L1.9 16c1.8 3.7 5.6 7 10.1 7z" />
                </svg>
                {{ __('auth.google_login') }}
            </a>

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