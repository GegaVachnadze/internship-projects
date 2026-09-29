<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.Dashboard') }} - {{ __('messages.Neighborhood Management') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg-slate-950 text-slate-100 font-sans antialiased selection:bg-indigo-500 selection:text-white flex flex-col justify-between">

    <div class="min-h-full flex flex-col justify-between relative overflow-hidden">

        <div class="absolute top-10 left-1/4 w-96 h-96 bg-indigo-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 right-1/4 w-96 h-96 bg-purple-600/15 rounded-full blur-3xl pointer-events-none"></div>

        <x-navigation />

        <main class="max-w-7xl mx-auto px-6 py-10 relative z-10 w-full my-auto">

            <div class="bg-slate-900/80 border border-slate-800/80 shadow-2xl rounded-3xl p-6 sm:p-8 mb-8 backdrop-blur-xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-white tracking-tight">
                        {{ __('messages.Welcome') }}, <span class="text-indigo-400">{{ $user->name }}</span>!
                    </h1>
                    <p class="text-slate-400 mt-2 text-sm">
                        @if($apartment)
                        {{ __('messages.Apartment Number') }}: <span class="font-semibold text-indigo-400">№ {{ $apartment->apartment_number }}</span> ({{ __('messages.Floor') }}: {{ $apartment->floor }})
                        @else
                        <span class="text-amber-400">{{ __('messages.Apartment not linked') }}</span>
                        @endif
                    </p>
                </div>
                <div>
                    <form method="POST" action="">
                        @csrf
                        <button type="submit" class="bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/30 px-5 py-2.5 rounded-xl text-sm font-semibold transition">
                            {{ __('messages.Logout') }}
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="bg-slate-900/80 border border-slate-800/80 shadow-2xl rounded-3xl p-6 sm:p-8 backdrop-blur-xl">
                    <h2 class="text-xl font-bold text-white mb-6 border-b border-slate-800 pb-4 flex items-center gap-3">
                        💳 {{ __('messages.My Payments') }}
                    </h2>
                    @if($payments->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-slate-300">
                            <thead class="bg-slate-950/60 uppercase text-xs text-slate-400 border-b border-slate-800">
                                <tr>
                                    <th class="py-3 px-4">{{ __('messages.Month') }}</th>
                                    <th class="py-3 px-4">{{ __('messages.Amount') }}</th>
                                    <th class="py-3 px-4">{{ __('messages.Status') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/60">
                                @foreach($payments as $payment)
                                <tr>
                                    <td class="py-3 px-4 font-medium text-white">{{ $payment->month }}</td>
                                    <td class="py-3 px-4 text-slate-300">{{ $payment->amount }} ₾</td>
                                    <td class="py-3 px-4">
                                        @if($payment->is_paid)
                                        <span class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs px-2.5 py-1 rounded-full font-medium">{{ __('messages.Paid') }}</span>
                                        @else
                                        <span class="bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs px-2.5 py-1 rounded-full font-medium">{{ __('messages.Pending') }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-slate-500 text-sm py-4">{{ __('messages.No payments history') }}</p>
                    @endif
                </div>

                <div class="bg-slate-900/80 border border-slate-800/80 shadow-2xl rounded-3xl p-6 sm:p-8 backdrop-blur-xl">
                    <h2 class="text-xl font-bold text-white mb-6 border-b border-slate-800 pb-4 flex items-center gap-3">
                        📢 {{ __('messages.Announcements') }}
                    </h2>
                    @if($announcements->count() > 0)
                    <div class="space-y-4">
                        @foreach($announcements as $announcement)
                        <div class="border-l-4 border-indigo-500 bg-slate-950/40 p-4 rounded-r-2xl border-y border-r border-slate-800/60">
                            <h3 class="font-semibold text-white">{{ $announcement->title }}</h3>
                            <p class="text-sm text-slate-400 mt-1 leading-relaxed">{{ $announcement->body }}</p>
                            <span class="text-xs text-slate-500 mt-2 block">{{ $announcement->created_at->format('d.m.Y H:i') }}</span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-slate-500 text-sm py-4">{{ __('messages.No announcements') }}</p>
                    @endif
                </div>

            </div>

        </main>

        <footer class="w-full text-center py-8 text-xs text-slate-600 relative z-10 mt-auto border-t border-slate-900">
            &copy; {{ date('Y') }} {{ __('messages.Neighborhood Management. All rights reserved.') }}
        </footer>

    </div>

</body>

</html>