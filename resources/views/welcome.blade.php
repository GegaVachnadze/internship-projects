<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.Neighborhood Management') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg-slate-950 text-slate-100 font-sans antialiased selection:bg-indigo-500 selection:text-white flex flex-col justify-between">

    <x-navigation />

    <main class="max-w-4xl mx-auto px-6 text-center py-16 relative z-10 my-auto">

        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold mb-8 backdrop-blur-md">
            {{ __('messages.Modern Management System') }}
        </div>

        <h1 class="text-5xl sm:text-7xl font-extrabold tracking-tight leading-[1.1] mb-8 text-white">
            {{ __('messages.Your House') }} — <span class="text-indigo-400">{{ __('messages.Everything in one space') }}</span>
        </h1>

        <p class="text-lg sm:text-xl text-slate-400 max-w-2xl mx-auto mb-12 leading-relaxed">
            {{ __('messages.Easy follow') }}
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-semibold px-8 py-4 rounded-2xl shadow-xl shadow-indigo-600/25 transition transform hover:-translate-y-0.5">
                {{ __('messages.Start registration') }}
            </a>
            @endif

            <a href="" class="bg-slate-900 hover:bg-slate-800 text-slate-200 border border-slate-800 font-semibold px-8 py-4 rounded-2xl transition">
                {{ __('messages.Login to System') }}
            </a>

        </div>

    </main>

    <footer class="w-full text-center py-8 text-xs text-slate-500 border-t border-slate-900 relative z-10">
        &copy; {{ date('Y') }} {{ __('messages.Neighborhood Management. All rights reserved.') }}
    </footer>

</body>

</html>