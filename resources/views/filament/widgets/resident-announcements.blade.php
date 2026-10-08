<x-filament-widgets::widget>
    <div class="mx-auto w-full max-w-3xl">
        @forelse ($announcements as $announcement)
            <div
                id="announcement-{{ $announcement->id }}"
                class="w-full scroll-mt-24"
            >
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

                    @if (
                        $announcement->requires_payment &&
                        auth()->user()?->hasRole(\App\Enums\UserRole::Resident->value)
                    )
                        <div class="mt-6">
                            <x-filament::button
                                color="primary"
                                icon="heroicon-o-credit-card"
                                wire:click="payMonthlyFee"
                            >
                                {{ app()->getLocale() === 'ka' ? 'გადახდა' : 'Pay' }}
                            </x-filament::button>
                        </div>
                    @endif

                    @if (
                        auth()->user()?->hasRole(\App\Enums\UserRole::Chairman->value)
                    )
                        <div class="flex justify-end pt-10">
                            <x-filament::button
                                color="danger"
                                icon="heroicon-o-trash"
                                wire:click="deleteAnnouncement({{ $announcement->id }})"
                                aria-label="{{ __('messages.delete') }}"
                                tooltip="{{ __('messages.delete') }}"
                            >
                            </x-filament::button>
                        </div>
                    @endif
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

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hash = window.location.hash;

            if (!hash.startsWith('#announcement-')) {
                return;
            }

            const scrollToAnnouncement = () => {
                const element = document.querySelector(hash);

                if (element) {
                    element.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start',
                    });
                }
            };

            setTimeout(scrollToAnnouncement, 300);
        });
    </script>
</x-filament-widgets::widget>