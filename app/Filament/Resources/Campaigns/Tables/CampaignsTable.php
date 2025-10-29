<?php

namespace App\Filament\Resources\Campaigns\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TColumn;
use Filament\Tables\Columns\TimestampColumn;


class CampaignsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')->sortable()->searchable()->toggleable()->toggleable(),
                TextColumn::make('link')->sortable()->searchable()->copyable()
                    ->copyMessage('Campaign Link copied')
                    ->copyMessageDuration(1500)->toggleable()->toggleable(),
                TextColumn::make('referred_count')->sortable()->searchable()->toggleable()->toggleable(),
                TextColumn::make('converted_count')->sortable()->searchable()->toggleable()->toggleable(),
                TextColumn::make('cost')->sortable()->searchable()->toggleable()->toggleable(),
                TextColumn::make('conversion_rate')
                    ->label('Conversion Rate')
                    ->getStateUsing(function ($record) {
                        if ($record->referred_count > 0) {
                            return round(($record->converted_count / $record->referred_count) * 100, 2) . '%';
                        }
                        return '0%';
                    })
                    ->sortable()->toggleable()->toggleable(),
                
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
