<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;

class SiteSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';
    protected static ?string $navigationLabel = 'Header & Footer';
    protected static ?string $navigationGroup = 'CMS Configuration';
    protected static ?int $navigationSort = 1;
    protected static string $view = 'filament.pages.site-settings';
    protected static ?string $title = 'Header & Footer Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->data = [
            // Branding
            'site_name'        => Setting::get('site_name', 'VICTORA GROUP'),
            'logo'             => Setting::get('logo'),
            'favicon'          => Setting::get('favicon'),

            // Header Navigation
            'header_nav'       => Setting::get('header_nav', []),
            'header_secondary_nav' => Setting::get('header_secondary_nav', []),
            'header_buttons'   => Setting::get('header_buttons', []),

            // Footer
            'footer_tagline'   => Setting::get('footer_tagline', ''),
            'copyright_text'   => Setting::get('copyright_text', '© ' . date('Y') . ' Victora Group. All rights reserved.'),
            'footer_nav'       => Setting::get('footer_nav', []),
            'footer_buttons'   => Setting::get('footer_buttons', []),

            // Contact Info
            'contact_email'    => Setting::get('contact_email', ''),
            'contact_phone'    => Setting::get('contact_phone', ''),
            'contact_address'  => Setting::get('contact_address', ''),
            'timing'  => Setting::get('timing', ''),


            // Social Media
            'social_linkedin'  => Setting::get('social_linkedin', ''),
            'social_twitter'   => Setting::get('social_twitter', ''),
            'social_facebook'  => Setting::get('social_facebook', ''),
            'social_instagram' => Setting::get('social_instagram', ''),
            'social_youtube'   => Setting::get('social_youtube', ''),
        ];

        $this->form->fill($this->data);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([

                    Forms\Components\Section::make('Branding')
                        ->description('Your site logo and name displayed across all pages.')
                        ->schema([
                            Forms\Components\TextInput::make('site_name')
                                ->label('Site Name')
                                ->required(),
                            CuratorPicker::make('logo')
                                ->label('Logo')
                                ->buttonLabel('Select / Change Logo')
                                ->nullable(),
                            CuratorPicker::make('favicon')
                                ->label('Favicon')
                                ->buttonLabel('Select / Change Favicon')
                                ->nullable(),
                        ]),

                    Forms\Components\Section::make('Header Navigation')
                        ->description('Top-level items can have dropdown children. Leave URL empty for a parent-only dropdown trigger.')
                        ->schema([
                            Forms\Components\Repeater::make('header_nav')
                                ->label('Main Navigation Items')
                                ->schema([
                                    Forms\Components\TextInput::make('label')
                                        ->label('Label')
                                        ->required()
                                        ->columnSpan(1),
                                    Forms\Components\TextInput::make('url')
                                        ->label('URL')
                                        ->placeholder('Leave empty for dropdown-only')
                                        ->columnSpan(1),
                                    Forms\Components\Toggle::make('open_in_new_tab')
                                        ->label('New Tab')
                                        ->default(false)
                                        ->columnSpan(1),
                                    Forms\Components\Repeater::make('children')
                                        ->label('Dropdown Children')
                                        ->schema([
                                            Forms\Components\TextInput::make('label')->required()->columnSpan(1),
                                            Forms\Components\TextInput::make('url')->required()->columnSpan(1),
                                            Forms\Components\Toggle::make('open_in_new_tab')->label('New Tab')->default(false)->columnSpan(1),
                                        ])
                                        ->columns(3)
                                        ->collapsible()
                                        ->defaultItems(0)
                                        ->columnSpanFull(),
                                ])
                                ->columns(3)
                                ->reorderable()
                                ->collapsible()
                                ->itemLabel(fn (array $state): ?string => $state['label'] ?? null),
                        ]),


                    Forms\Components\Section::make('Header Buttons')
                        ->description('Action buttons displayed on the right side of the header.')
                        ->schema([
                            Forms\Components\Repeater::make('header_buttons')
                                ->label('Buttons')
                                ->schema([
                                    CuratorPicker::make('icon')
                                        ->label('Icon')
                                        ->buttonLabel('Select / Change Icon')
                                        ->nullable(),
                                    Forms\Components\TextInput::make('label')->required()->columnSpan(1),
                                    Forms\Components\TextInput::make('url')->required()->columnSpan(1),
                                    Forms\Components\Select::make('target')
                                        ->options([
                                            '_self' => 'Same Tab',
                                            '_blank' => 'New Tab',
                                        ])
                                        ->default('_self')
                                        ->columnSpan(1),
                                ])
                                ->columns(3)
                                ->reorderable()
                                ->collapsible()
                                ->itemLabel(fn (array $state): ?string => $state['label'] ?? null),
                        ]),

                    Forms\Components\Section::make('Footer Navigation')
                        ->description('Organize footer links into named columns. Each column has a heading and its own list of links.')
                        ->schema([
                            Forms\Components\Repeater::make('footer_nav')
                                ->label('Footer Columns')
                                ->schema([
                                    Forms\Components\TextInput::make('column_title')
                                        ->label('Column Heading')
                                        ->required()
                                        ->columnSpanFull(),
                                    Forms\Components\Repeater::make('links')
                                        ->label('Links in this Column')
                                        ->schema([
                                            Forms\Components\TextInput::make('label')->required()->columnSpan(1),
                                            Forms\Components\TextInput::make('url')->required()->columnSpan(1),
                                        ])
                                        ->columns(2)
                                        ->reorderable()
                                        ->defaultItems(1)
                                        ->columnSpanFull(),
                                ])
                                ->reorderable()
                                ->collapsible()
                                ->itemLabel(fn (array $state): ?string => $state['column_title'] ?? null),
                        ]),

                   

                ])->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()->schema([

                    Forms\Components\Section::make('Footer Info')
                        ->schema([
                            Forms\Components\Textarea::make('footer_tagline')
                                ->label('Tagline / Description')
                                ->rows(3),
                            Forms\Components\TextInput::make('copyright_text')
                                ->label('Copyright Text'),
                        ]),

                    Forms\Components\Section::make('Contact Information')
                        ->schema([
                            Forms\Components\TextInput::make('contact_email')
                                ->label('Email')
                                ->email(),
                            Forms\Components\TextInput::make('contact_phone')
                                ->label('Phone'),
                                 Forms\Components\TextInput::make('timing')
                                ->label('Timing'),
                            Forms\Components\Textarea::make('contact_address')
                                ->label('Address')
                                ->rows(2),
                        ]),

                    Forms\Components\Section::make('Social Media')
                        ->schema([
                            Forms\Components\TextInput::make('social_linkedin')->label('LinkedIn')->url()->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('social_twitter')->label('Twitter / X')->url()->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('social_facebook')->label('Facebook')->url()->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('social_instagram')->label('Instagram')->url()->prefixIcon('heroicon-o-link'),
                            Forms\Components\TextInput::make('social_youtube')->label('YouTube')->url()->prefixIcon('heroicon-o-link'),
                        ]),

                ])->columnSpan(['lg' => 1]),

            ])
            ->columns(3)
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save Settings')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            foreach ($data as $key => $value) {
                Setting::set($key, $value);
            }

            Notification::make()
                ->title('Settings saved successfully.')
                ->success()
                ->send();

        } catch (Halt $exception) {
            return;
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error saving settings: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }
}
