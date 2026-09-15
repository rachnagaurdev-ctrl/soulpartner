<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Awcodes\Curator\CuratorPlugin;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\Navigation\MenuItem;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\View\PanelsRenderHook;
use Filament\Support\Facades\FilamentView;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->maxContentWidth(MaxWidth::Full)
            ->colors([
                'primary' => '#E31E24',
                'gray' => Color::Slate,
            ])
            ->font('Inter')
            ->favicon(asset('favicon.ico'))
            ->brandName('SOULMATE INDIA')
            ->spa()
            ->databaseNotifications()
            ->userMenuItems([
                'clear-cache' => MenuItem::make()
                    ->label('Clear Cache')
                    ->icon('heroicon-o-trash')
                    ->url(fn (): string => route('tools.clear-cache')),
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn () => new \Illuminate\Support\HtmlString('
                    <style>
                        .fi-sidebar { background-color: #111827 !important; }
                        .fi-sidebar-nav { background-color: #111827 !important; }
                        .fi-sidebar-group-label { color: #9ca3af !important; }
                        .fi-sidebar-item-label { color: #d1d5db !important; }
                        .fi-sidebar-item-icon { color: #9ca3af !important; }
                        .fi-sidebar-item-button:hover { background-color: rgba(255, 255, 255, 0.05) !important; }
                        .fi-sidebar-item-button.fi-active { background-color: #E31E24 !important; }
                        .fi-sidebar-item-button.fi-active .fi-sidebar-item-label,
                        .fi-sidebar-item-button.fi-active .fi-sidebar-item-icon { color: #ffffff !important; }
                        .fi-brand { color: #E31E24 !important; font-weight: 800 !important; }
                        /* Catch-all for any other text in sidebar */
                        .fi-sidebar span, .fi-sidebar svg { color: inherit; }
                        .fi-sidebar-item-button:not(.fi-active) .fi-sidebar-item-label { color: #d1d5db !important; }

                        /* Ensure Media Picker grid fits 4 to 6 images per row */
                        .curator-picker-grid {
                            display: grid !important;
                            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)) !important;
                            gap: 1rem !important;
                        }
                        .curator-picker-grid li {
                            aspect-ratio: 1 / 1;
                        }
                    </style>
                ')
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make(),
                CuratorPlugin::make()
                    ->label('Media Manager')
                    ->navigationIcon('heroicon-o-photo')
                    ->navigationGroup('Media')
                    ->navigationSort(3)
                    ->navigationCountBadge(),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
