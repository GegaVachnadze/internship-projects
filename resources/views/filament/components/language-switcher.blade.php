@php
$currentLocale = app()->getLocale();

$enClass = $currentLocale === 'en' ? 'font-bold text-amber-500 underline' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400';
$kaClass = $currentLocale === 'ka' ? 'font-bold text-amber-500 underline' : 'text-gray-500 hover:text-gray-700 dark:text-gray-400';

$enUrl = route('lang.switch', 'en');
$kaUrl = route('lang.switch', 'ka');
@endphp

<div class="flex items-center gap-2 px-3 text-sm">
    <a href="{{ $enUrl }}" class="{{ $enClass }}">EN</a>
    <span class="text-gray-400">/</span>
    <a href="{{ $kaUrl }}" class="{{ $kaClass }}">GE</a>
</div>