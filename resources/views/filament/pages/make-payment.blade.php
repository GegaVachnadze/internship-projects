<x-filament-panels::page>
    @if ($saved)
        <div class="mb-6 rounded-xl border border-success-500/30 bg-success-500/10 px-4 py-3">
            <div class="flex items-center gap-3">
                <x-filament::icon
                    icon="heroicon-o-check-circle"
                    class="h-6 w-6 text-success-500"
                />

                <div>
                    <p class="font-medium text-success-700 dark:text-success-400">
                        {{ __('messages.payment_saved') }}
                    </p>

                    <p class="text-sm text-success-600 dark:text-success-500">
                        {{ __('messages.payment_saved_description') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <form wire:submit="save">
        {{ $this->form }}

        <div style="padding-top: 40px;">
            <x-filament::button
                type="submit"
                icon="heroicon-o-check"
            >
                {{ __('messages.i_transferred') }}
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>