<?php

namespace App\Filament\Resources\Campaigns\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class CampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
                TextInput::make('name')
                    ->label('Name')
                    ->nullable()
                    ->required(),
                TextInput::make('link')
                    ->label('Link')
                    ->nullable()
                    ->required(),
                TextInput::make('referred_count')
                    ->label('Referred Count')
                    ->numeric()
                    ->nullable(),
                TextInput::make('converted_count')
                    ->label('Converted Count')
                    ->numeric()
                    ->nullable(),
                TextInput::make('cost')
                    ->label('Cost')
                    ->numeric()
                    ->nullable(),
            ]);
    }
}
