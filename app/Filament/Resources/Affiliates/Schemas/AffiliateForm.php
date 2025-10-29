<?php

namespace App\Filament\Resources\Affiliates\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;;

use Filament\Forms\Components\Select;

class AffiliateForm
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
                TextInput::make('referral_code')
                    ->label('Referral Code')
                    ->nullable()
                    ->required(),
                Select::make('student_id')
                    ->options([])
                    ->relationship('student', 'id')
                    ->label('Student ID')
                    ->nullable(),
                TextInput::make('total_referrals')
                    ->label('Total Referrals')
                    ->numeric()
                    ->nullable()->disabled(),
                TextInput::make('converted_referrals')
                    ->label('Converted Referrals')
                    ->numeric()
                    ->nullable()->disabled(),
                TextInput::make('total_earnings')
                    ->label('Total Earnings')
                    ->numeric()
                    ->nullable()->disabled(),
                TextInput::make('withdrawn_earnings')
                    ->label('Withdrawn Earnings')
                    ->numeric()
                    ->minValue(0)      // ensures value >= 0
                    ->step(1)
                    ->nullable()->disabled(),
                TextInput::make('remaining_balance')
                    ->label('Remaining Balance')
                    ->numeric()
                    ->minValue(0)      // ensures value >= 0
                    ->step(1)
                    ->nullable()->disabled(),
                Toggle::make('is_active')
                    ->label('Is Active')
                    ->default(false),
            ]);
    }
}
