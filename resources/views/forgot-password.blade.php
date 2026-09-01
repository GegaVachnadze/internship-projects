<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('auth.reset_password_title') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-xl border border-slate-100">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">{{ __('auth.reset_password_title') }}</h1>
            <p class="text-sm text-slate-500 mt-1">{{ __('auth.reset_password_text') }}</p>
        </div>

        @if (session('status'))
        <div class="mb-4 p-3 text-sm text-emerald-600 bg-emerald-50 rounded-xl border border-emerald-100 font-medium text-center">
            {{ session('status') }}
        </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">{{ __('auth.email') }}</label>
                <input type="email" id="emailInput" name="email" value="{{ old('email') }}" placeholder="email@domain.com"
                    class="w-full px-4 py-3 text-sm bg-slate-50 border @error('email') border-rose-500 bg-rose-50 @else border-slate-300 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">

                @error('email')
                <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-lg shadow-indigo-500/25 transition-all active:scale-[0.98]">
                {{ __('auth.send_reset_link') }}
            </button>

            <div class="text-center text-sm text-slate-500 pt-2">
                <a href="{{ url('/authorize') }}" class="text-indigo-600 font-semibold hover:underline">{{ __('auth.authorization') }}</a>
            </div>
        </form>
    </div>

</body>

</html>