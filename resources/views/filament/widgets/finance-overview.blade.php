<x-filament::section
    class="!border-primary-200 !bg-primary-50/40 dark:!border-primary-500/20 dark:!bg-primary-950/20"
>
    <x-slot name="heading">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary-100 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                <x-filament::icon
                    icon="heroicon-o-chart-bar"
                    class="h-5 w-5"
                />
            </div>

            <div>
                <div class="text-lg font-semibold text-gray-950 dark:text-white">
                    {{ __('messages.finance_overview') }}
                </div>

                <div class="mt-0.5 text-sm font-normal text-gray-500 dark:text-gray-400">
                    {{ __('messages.finance_overview_description') }}
                </div>
            </div>
        </div>
    </x-slot>

    {{-- Financial statistics --}}
    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">

        {{-- Expected --}}
        <div class="rounded-2xl border border-primary-200 bg-white p-5 shadow-sm dark:border-primary-500/20 dark:bg-gray-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        {{ __('messages.Expected') }}
                    </p>

                    <p class="mt-2 text-2xl font-bold tracking-tight text-gray-950 dark:text-white">
                        {{ number_format($expected, 2) }} ₾
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary-100 text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                    <x-filament::icon
                        icon="heroicon-o-banknotes"
                        class="h-5 w-5"
                    />
                </div>
            </div>
        </div>

        {{-- Collected --}}
        <div class="rounded-2xl border border-success-200 bg-white p-5 shadow-sm dark:border-success-500/20 dark:bg-gray-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        {{ __('messages.Collected') }}
                    </p>

                    <p class="mt-2 text-2xl font-bold tracking-tight text-gray-950 dark:text-white">
                        {{ number_format($collected, 2) }} ₾
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-success-100 text-success-600 dark:bg-success-500/10 dark:text-success-400">
                    <x-filament::icon
                        icon="heroicon-o-check-circle"
                        class="h-5 w-5"
                    />
                </div>
            </div>
        </div>

        {{-- Remaining --}}
        <div class="rounded-2xl border border-warning-200 bg-white p-5 shadow-sm dark:border-warning-500/20 dark:bg-gray-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        {{ __('messages.Remaining') }}
                    </p>

                    <p class="mt-2 text-2xl font-bold tracking-tight text-gray-950 dark:text-white">
                        {{ number_format($remaining, 2) }} ₾
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-warning-100 text-warning-600 dark:bg-warning-500/10 dark:text-warning-400">
                    <x-filament::icon
                        icon="heroicon-o-clock"
                        class="h-5 w-5"
                    />
                </div>
            </div>
        </div>

        {{-- Expenses --}}
        <div class="rounded-2xl border border-danger-200 bg-white p-5 shadow-sm dark:border-danger-500/20 dark:bg-gray-900">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        {{ __('messages.Expenses') }}
                    </p>

                    <p class="mt-2 text-2xl font-bold tracking-tight text-gray-950 dark:text-white">
                        {{ number_format($expenses, 2) }} ₾
                    </p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-danger-100 text-danger-600 dark:bg-danger-500/10 dark:text-danger-400">
                    <x-filament::icon
                        icon="heroicon-o-arrow-trending-down"
                        class="h-5 w-5"
                    />
                </div>
            </div>
        </div>
    </div>

    {{-- Collection --}}
    <div class="mt-4 rounded-2xl border border-primary-200 bg-white p-5 shadow-sm dark:border-primary-500/20 dark:bg-gray-900">
        <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                    {{ __('messages.Collection %') }}
                </p>

                <div class="mt-1 flex items-baseline gap-3">
                    <span class="text-4xl font-bold tracking-tight text-gray-950 dark:text-white">
                        {{ number_format($collectionPercentage, 1) }}%
                    </span>

                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        {{ number_format($collected, 2) }} ₾ /
                        {{ number_format($expected, 2) }} ₾
                    </span>
                </div>
            </div>

            <div class="w-full lg:max-w-2xl">
                <div class="mb-2 flex items-center justify-between">
                    <span class="text-xs font-medium text-gray-500 dark:text-gray-400">
                        {{ __('messages.collection_progress') }}
                    </span>

                    <span class="text-xs font-semibold text-primary-600 dark:text-primary-400">
                        {{ number_format($collectionPercentage, 1) }}%
                    </span>
                </div>

                <div class="h-3 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-800">
                    <div
                        class="h-full rounded-full bg-primary-500 transition-all duration-700"
                        style="width: {{ min(100, $collectionPercentage) }}%;"
                    ></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Financial actions --}}
    <div class="mt-4 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-white/10 dark:bg-gray-900">
        <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

            <div>
                <p class="text-base font-semibold text-gray-950 dark:text-white">
                    {{ __('messages.financial_actions') }}
                </p>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('messages.financial_actions_description') }}
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <x-filament::button
                    color="gray"
                    icon="heroicon-o-building-library"
                    disabled
                >
                    {{ __('messages.add_bank_account') }}
                </x-filament::button>

                <x-filament::button
                    icon="heroicon-o-arrow-up-right"
                    :href="\App\Filament\Resources\PaymentResource::getUrl('create')"
                >
                    {{ __('messages.make_transfer') }}
                </x-filament::button>
            </div>
        </div>
    </div>
</x-filament::section>