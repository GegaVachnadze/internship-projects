<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.Register') }} - {{ __('messages.Neighborhood Management') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg-slate-950 text-slate-100 font-sans antialiased selection:bg-indigo-500 selection:text-white flex flex-col justify-between">

    <div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative overflow-hidden">

        <div class="absolute top-10 left-1/4 w-96 h-96 bg-indigo-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-1/4 w-96 h-96 bg-purple-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="sm:mx-auto sm:w-full sm:max-w-md relative z-10 text-center">
            <a href="{{ url('/') }}" class="inline-flex w-12 h-12 rounded-2xl bg-indigo-600/20 border border-indigo-500/30 items-center justify-center text-2xl shadow-inner mb-4 hover:bg-indigo-600/30 transition">
                🏢
            </a>
            <h2 class="text-3xl font-extrabold tracking-tight text-white">
                {{ __('messages.Create an account') }}
            </h2>
            <p class="mt-2 text-sm text-slate-400">
                {{ __('messages.Join your neighborhood and manage everything easily') }}
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md relative z-10 px-4">
            <div class="bg-slate-900/80 border border-slate-800/80 py-8 px-6 shadow-2xl rounded-3xl backdrop-blur-xl sm:px-10">

                @if ($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <form class="space-y-5" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                            {{ __('messages.Name') }}
                        </label>
                        <input id="name" name="name" type="text" required autofocus autocomplete="name"
                            value="{{ old('name') }}"
                            class="w-full px-4 py-3 rounded-xl bg-slate-950/60 border border-slate-800 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition text-sm"
                            placeholder="მაგ: გიორგი ვაჩნაძე">
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                            {{ __('messages.Email Address') }}
                        </label>
                        <input id="email" name="email" type="email" required autocomplete="username"
                            value="{{ old('email') }}"
                            class="w-full px-4 py-3 rounded-xl bg-slate-950/60 border border-slate-800 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition text-sm"
                            placeholder="name@example.com">
                    </div>

                    <div>
                        <label for="apartment_number" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                            {{ __('messages.Apartment Number') }}
                        </label>
                        <input id="apartment_number" name="apartment_number" type="text" required
                            value="{{ old('apartment_number') }}"
                            class="w-full px-4 py-3 rounded-xl bg-slate-950/60 border border-slate-800 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition text-sm"
                            placeholder="მაგ: ბინა 42, სართული 5">
                    </div>

                    <div>
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                            {{ __('messages.Password') }}
                        </label>
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-xl bg-slate-950/60 border border-slate-800 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition text-sm"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                            {{ __('messages.Confirm Password') }}
                        </label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-xl bg-slate-950/60 border border-slate-800 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition text-sm"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold shadow-lg shadow-indigo-600/30 transition transform hover:-translate-y-0.5 text-sm">
                            {{ __('messages.Register') }}
                        </button>
                    </div>
                </form>

                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-800"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-slate-900 px-3 text-slate-500 font-medium">{{ __('messages.Or continue with') }}</span>
                    </div>
                </div>

                <div>
                    <a href="#" class="w-full flex items-center justify-center gap-3 py-3 px-4 rounded-xl bg-slate-950/60 border border-slate-800 hover:bg-slate-800/60 text-slate-200 font-medium transition text-sm">
                        <svg class="w-5 h-5" viewBox="0 0 24 24">
                            <path fill="#EA4335" d="M12 5c1.6 0 3 .6 4.1 1.6l3.1-3.1C17.3 1.8 14.8 1 12 1 7.5 1 3.7 3.6 1.8 7.4l3.7 2.9C6.4 7.3 9 5 12 5z" />
                            <path fill="#4285F4" d="M23.5 12.3c0-.8-.1-1.7-.2-2.3H12v4.5h6.5c-.3 1.5-1.1 2.8-2.4 3.7l3.7 2.9c2.2-2 3.7-5 3.7-8.8z" />
                            <path fill="#FBBC05" d="M5.5 14.7c-.2-.7-.4-1.5-.4-2.7s.2-2 .4-2.7L1.8 6.4C.7 8.6 0 11.2 0 14s.7 5.4 1.8 7.6l3.7-2.9z" />
                            <path fill="#34A853" d="M12 23c3.2 0 6-1.1 8-3l-3.7-2.9c-1.1.7-2.5 1.2-4.3 1.2-3 0-5.6-2.3-6.5-5.3L1.8 15.9C3.7 19.7 7.5 23 12 23z" />
                        </svg>
                        {{ __('messages.Register with Google') }}
                    </a>
                </div>

                <div class="mt-6 text-center text-sm text-slate-400">
                    {{ __('messages.Already have an account?') }}
                    <a href="" class="font-medium text-indigo-400 hover:text-indigo-300 transition ml-1">
                        {{ __('messages.Login') }}
                    </a>
                </div>

            </div>
        </div>

        <footer class="w-full text-center py-8 text-xs text-slate-600 relative z-10 mt-auto">
            &copy; {{ date('Y') }} {{ __('messages.Neighborhood Management. All rights reserved.') }}
        </footer>

    </div>

</body>

</html>