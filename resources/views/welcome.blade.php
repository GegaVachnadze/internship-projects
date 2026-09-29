<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Neighborhood Management') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg-slate-950 text-slate-100 font-sans antialiased selection:bg-indigo-500 selection:text-white">

    <div class="min-h-full flex flex-col justify-between relative overflow-hidden">

        <div class="absolute top-0 left-1/4 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl pointer-events-none"></div>

        <header class="w-full max-w-7xl mx-auto px-6 h-24 flex justify-between items-center relative z-10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-600/20 border border-indigo-500/30 flex items-center justify-center text-xl shadow-inner">
                    🏢
                </div>
                <span class="font-bold text-xl tracking-tight text-white">{{ __('Neighbourhood') }}</span>
            </div>

            <div class="flex items-center gap-3">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="text-sm font-medium px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 transition">
                    {{ __('Dashboard') }}
                </a>
                @else
                <a href="" class="text-sm font-medium px-5 py-2.5 rounded-xl text-slate-300 hover:text-white transition">
                    {{ __('Login') }}
                </a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-sm font-medium px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white shadow-lg shadow-indigo-600/30 transition">
                    {{ __('Register') }}
                </a>
                @endif
                @endauth
                @endif
            </div>
        </header>

        <main class="max-w-4xl mx-auto px-6 text-center py-16 relative z-10 my-auto">

            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold mb-8 backdrop-blur-md">
                {{ __('Modern Management System') }}
            </div>

            <h1 class="text-5xl sm:text-7xl font-extrabold tracking-tight leading-[1.1] mb-8 text-white">
                {{__('Your House')}} — <span class="text-indigo-400">{{__('Everything in one space')}}</span>
            </h1>

            <p class="text-lg sm:text-xl text-slate-400 max-w-2xl mx-auto mb-12 leading-relaxed">
                {{__('Easy follow')}}
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-8 py-4 rounded-2xl shadow-xl shadow-indigo-600/25 transition transform hover:-translate-y-0.5">
                    {{ __('Start registration') }}
                </a>
                @endif

                <a href="{{ route('register') }}" class="bg-slate-900 hover:bg-slate-800 text-slate-200 border border-slate-800 font-semibold px-8 py-4 rounded-2xl transition">
                    {{ __('Login to System') }}
                </a>

            </div>

        </main>

        <footer class="w-full text-center py-8 text-xs text-slate-500 border-t border-slate-900 relative z-10">
            &copy; {{ date('Y') }} {{ __('Neighborhood Management. All rights reserved.') }}
        </footer>

    </div>

</body>

</html>