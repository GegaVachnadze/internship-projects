<?php

namespace App\Filament\Components;

use Filament\Navigation\NavigationItem;
use Filament\Panel;
use Filament\View\PanelsRenderHook;

class PanelFeatures
{
    public static function configure(Panel $panel): Panel
    {
        return $panel
            ->renderHook(
                PanelsRenderHook::USER_MENU_BEFORE,
                fn (): string => view(
                    'filament.components.language-switcher'
                )->render(),
            )
            ->renderHook(
                PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE,
                fn (): string => view(
                    'filament.components.language-switcher'
                )->render(),
            )
            ->renderHook(
                PanelsRenderHook::AUTH_REGISTER_FORM_BEFORE,
                fn (): string => view(
                    'filament.components.language-switcher'
                )->render(),
            );
    }
}