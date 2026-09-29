<header class="w-full max-w-7xl mx-auto px-6 h-24 flex justify-between items-center relative z-10">
    <!-- Logo / Brand on the Left -->
    <div class="flex items-center gap-3">
        <a href="{{ url('/') }}" class="flex items-center gap-3 group">
            <div class="w-10 h-10 rounded-xl bg-indigo-600/20 border border-indigo-500/30 flex items-center justify-center text-xl shadow-inner group-hover:bg-indigo-600/30 transition">
                🏢
            </div>
            <span class="font-bold text-xl tracking-tight text-white">{{ __('messages.Neighbourhood') }}</span>
        </a>
    </div>

    <!-- Right Side: Language Switcher & Auth Actions -->
    <div class="flex items-center gap-4">

        <!-- Language Switcher (EN / GE) -->
        <div class="flex items-center gap-1 bg-slate-900/80 border border-slate-800 rounded-xl p-1 text-xs backdrop-blur-md">
            <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ app()->getLocale() == 'en' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-400 hover:text-white' }}">
                EN
            </a>
            <a href="{{ route('lang.switch', 'ka') }}" class="px-3 py-1.5 rounded-lg font-semibold transition {{ app()->getLocale() == 'ka' ? 'bg-indigo-600 text-white shadow-md shadow-indigo-600/30' : 'text-slate-400 hover:text-white' }}">
                GE
            </a>
        </div>

        @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}" class="text-sm font-medium px-5 py-2.5 rounded-xl bg-slate-900/80 hover:bg-slate-800 border border-slate-800 text-slate-200 transition">
            {{ __('messages.Dashboard') }}
        </a>
        @else
        <a href="{{ route('login') }}" class="text-sm font-medium px-5 py-2.5 rounded-xl text-slate-300 hover:text-white transition">
            {{ __('messages.Login') }}
        </a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="text-sm font-medium px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white shadow-lg shadow-indigo-600/30 transition">
            {{ __('messages.Register') }}
        </a>
        @endif
        @endauth
        @endif
    </div>
</header>