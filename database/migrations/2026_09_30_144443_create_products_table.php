<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Produk')
                    ->searchable(),

                TextColumn::make('brand')
                    ->label('Brand')
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Kategori'),

                TextColumn::make('supplier.name')
                    ->label('Supplier'),

                TextColumn::make('price')
                    ->label('Harga')
                    ->formatStateUsing(
                        fn ($state) => 'Rp ' . number_format((float) $state, 0, ',', '.')
                    ),

                TextColumn::make('stock')
                    ->label('Stok'),

                TextColumn::make('size')
                    ->label('Ukuran'),

                TextColumn::make('color')
                    ->label('Warna'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([]);
    }
}