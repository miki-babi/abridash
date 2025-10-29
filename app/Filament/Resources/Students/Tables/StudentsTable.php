<?php

namespace App\Filament\Resources\Students\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TColumn;
use Filament\Tables\Columns\TimestampColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TextFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Support\Icons\Heroicon;



class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                //
                IconColumn::make('is_registered')
                    ->label('Registered')
                    ->boolean()
                    ->trueIcon(Heroicon::OutlinedCheckBadge)
                    ->falseIcon(Heroicon::OutlinedXMark)->toggleable()->sortable(),
                TextColumn::make('name')->sortable()->searchable()->toggleable(),
                TextColumn::make('phone_number')->sortable()->searchable()->toggleable(),
                TextColumn::make('created_at')->label('Created At')->sortable()->toggleable(),
                TextColumn::make('updated_at')->label('Updated At')->sortable()->toggleable(),
            ])
            ->filters([
                //
                SelectFilter::make('source')
                    ->options([
                        1 => 'Fruits',
                        2 => 'Vegetables',
                        3 => 'Drinks',
                    ])
                    ->label('Source'),
                Filter::make('is_registered')
                    ->query(fn(Builder $query): Builder => $query->where('is_registered', true))
                    ->label('Registered'),

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
