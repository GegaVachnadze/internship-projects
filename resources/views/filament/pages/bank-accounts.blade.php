<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div style="padding-top: 40px;">
            <x-filament::button
                type="submit"
                icon="heroicon-o-check"
            >
                {{ __('messages.save') }}
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>