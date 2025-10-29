<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use App\Models\Campaign;
use App\Models\Student;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('telegram_id'),
                TextInput::make('name'),
                TextInput::make('username'),
                TextInput::make('phone_number'),
                Select::make('referred_by')
                    ->label('Referred By')
                    ->options(fn() => Student::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->disabled(),
                Select::make('source')
                    ->label('Source')
                    ->options(fn() => Campaign::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->disabled(),
                Toggle::make('is_registered')->label('Is Registered'),

            ]);
    }
}
