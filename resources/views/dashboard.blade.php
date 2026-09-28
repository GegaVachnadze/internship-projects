<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Dashboard') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">

        <div class="bg-white shadow rounded-lg p-6 mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ __('Welcome') }}, {{ $user->name }}!</h1>
                <p class="text-gray-600 mt-1">
                    @if($apartment)
                    {{ __('Apartment Number') }}: <span class="font-semibold text-indigo-600">№ {{ $apartment->apartment_number }}</span> ({{ __('Floor') }}: {{ $apartment->floor }})
                    @else
                    <span class="text-amber-600">{{ __('Apartment not linked') }}</span>
                    @endif
                </p>
            </div>
            <div>
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">{{ __('My Payments') }}</h2>
                @if($payments->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-600">
                        <thead class="bg-gray-50 uppercase text-xs text-gray-700">
                            <tr>
                                <th class="py-2 px-3">{{ __('Month') }}</th>
                                <th class="py-2 px-3">{{ __('Amount') }}</th>
                                <th class="py-2 px-3">{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr class="border-b">
                                <td class="py-2 px-3">{{ $payment->month }}</td>
                                <td class="py-2 px-3">{{ $payment->amount }} ₾</td>
                                <td class="py-2 px-3">
                                    @if($payment->is_paid)
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">{{ __('Paid') }}</span>
                                    @else
                                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded">{{ __('Pending') }}</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="text-gray-500 text-sm">{{ __('No payments history') }}</p>
                @endif
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">{{ __('Announcements') }}</h2>
                @if($announcements->count() > 0)
                <div class="space-y-4">
                    @foreach($announcements as $announcement)
                    <div class="border-l-4 border-indigo-500 pl-4 py-1">
                        <h3 class="font-semibold text-gray-800">{{ $announcement->title }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $announcement->body }}</p>
                        <span class="text-xs text-gray-400 mt-1 block">{{ $announcement->created_at->format('d.m.Y H:i') }}</span>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 text-sm">{{ __('No announcements') }}</p>
                @endif
            </div>

        </div>

    </div>
</body>

</html>