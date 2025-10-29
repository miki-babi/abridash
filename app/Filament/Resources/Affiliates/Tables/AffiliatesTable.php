<?php

namespace App\Filament\Resources\Affiliates\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TColumn;
use Filament\Tables\Columns\TimestampColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Support\Icons\Heroicon;


class AffiliatesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->trueIcon(Heroicon::OutlinedCheckBadge)
                    ->falseIcon(Heroicon::OutlinedXMark)->toggleable()->sortable(),
                TextColumn::make('name')->sortable()->searchable()->toggleable(),
                TextColumn::make('referral_code')->sortable()->searchable()
                ->copyable()
                ->copyMessage('Referral Code copied')
                ->copyMessageDuration(1500)->toggleable(),
                TextColumn::make('balance')->sortable()->searchable()->toggleable(),
                TextColumn::make('remaining_balance')->label('Remaining Balance')->sortable()->searchable()->toggleable(),
                
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
