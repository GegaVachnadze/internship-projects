<x-filament-widgets::widget>
    <div class="mx-auto w-full max-w-3xl">
        @forelse ($announcements as $announcement)
            <div class="w-full">
                <x-filament::section
                    class="!border-gray-700/60 !bg-[#262626]"
                >
                    <x-slot name="heading">
                        <div class="flex flex-wrap items-center gap-2">
                            <x-filament::icon
                                icon="heroicon-o-megaphone"
                                class="h-5 w-5 text-primary-600 dark:text-primary-400"
                            />

                            <span class="text-white">
                                {{ $announcement->title }}
                            </span>

                            @if ($announcement->requires_payment)
                                <x-filament::badge color="warning">
                                    {{ __('messages.requires_payment') }}
                                </x-filament::badge>
                            @endif
                        </div>
                    </x-slot>

                    <div class="prose prose-sm max-w-none leading-6 text-gray-200 dark:prose-invert">
                        {!! $announcement->body !!}
                    </div>

                    <div class="mt-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <p class="text-xs text-gray-400">
                            {{ $announcement->created_at?->format('d.m.Y H:i') }}
                        </p>

                        <div class="flex flex-wrap items-center gap-2">

                            {{-- Resident payment buttons --}}
                            @if (
                                $announcement->requires_payment &&
                                auth()->user()?->hasRole(\App\Enums\UserRole::Resident->value)
                            )
                                {{-- Bank of Georgia --}}
                                <x-filament::button
                                    tag="a"
                                    color="primary"
                                    icon="heroicon-o-building-library"
                                    href="https://bogpay.ge/ka/gadaricxva"
                                    target="_blank"
                                >
                                    საქართველოს ბანკი
                                </x-filament::button>

                                {{-- TBC --}}
                                <x-filament::button
                                    tag="a"
                                    color="info"
                                    icon="heroicon-o-building-library"
                                    href="https://tbcpay.ge/ka/transfers"
                                    target="_blank"
                                >
                                    TBC
                                </x-filament::button>
                            @endif

                            {{-- Chairman can delete --}}
                            @if (
                                auth()->user()?->hasRole(\App\Enums\UserRole::Chairman->value)
                            )
                                <x-filament::button
                                    color="danger"
                                    icon="heroicon-o-trash"
                                    wire:click="deleteAnnouncement({{ $announcement->id }})"
                                >
                                    {{ __('messages.delete') }}
                                </x-filament::button>
                            @endif

                        </div>
                    </div>
                </x-filament::section>
            </div>

            @if (! $loop->last)
                <div style="height: 40px;"></div>
            @endif

        @empty
            <x-filament::section
                class="!border-gray-700/60 !bg-[#262626]"
            >
                <div class="py-5 text-center">
                    <x-filament::icon
                        icon="heroicon-o-megaphone"
                        class="mx-auto h-8 w-8 text-gray-400"
                    />

                    <p class="mt-3 text-sm text-gray-400">
                        {{ __('messages.no_announcements') }}
                    </p>
                </div>
            </x-filament::section>
        @endforelse
    </div>
</x-filament-widgets::widget>