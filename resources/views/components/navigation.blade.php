 <header class="w-full max-w-7xl mx-auto px-6 h-24 flex justify-between items-center relative z-10">
     <div class="flex items-center gap-3">
         <div class="w-10 h-10 rounded-xl bg-indigo-600/20 border border-indigo-500/30 flex items-center justify-center text-xl shadow-inner">
             🏢
         </div>
         <span class="font-bold text-xl tracking-tight text-white">{{ __('messages.Neighbourhood') }}</span>
     </div>

     <div class="flex items-center gap-3">
         @if (Route::has('login'))
         @auth
         <a href="{{ url('/dashboard') }}" class="text-sm font-medium px-5 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 transition">
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