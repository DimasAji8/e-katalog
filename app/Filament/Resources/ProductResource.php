<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Filament\Resources\ProductResource\Pages;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $navigationGroup = 'Master';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('kategori_id')
                    ->relationship('kategori', 'name') // Menampilkan nama kategori
                    ->label('Kategori')
                    ->required(),

                Select::make('merk_id')
                    ->relationship('merk', 'nama') // Menampilkan nama merk
                    ->label('Merk')
                    ->required(),

                TextInput::make('name')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->label('Deskripsi')
                    ->rows(4),

                TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->required(),

                TextInput::make('ukuran')
                    ->label('Ukuran'),

                Textarea::make('penggunaan')
                    ->label('Penggunaan')
                    ->rows(3),

                TextInput::make('desain')
                    ->label('Desain'),

                TextInput::make('permukaan')
                    ->label('Permukaan'),

                TextInput::make('sentuhan_akhir')
                    ->label('Sentuhan Akhir'),

                FileUpload::make('images')
                    ->label('Gambar Produk')
                    ->multiple()
                    ->disk('public')
                    ->directory('product-images')
                    ->image()
                    ->maxSize(1024)
                    ->minFiles(1)
                    ->maxFiles(5),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Produk')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable(),

                TextColumn::make('merk.nama')
                    ->label('Merk')
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Harga')
                    ->sortable(),

                TextColumn::make('ukuran')
                    ->label('Ukuran'),

                TextColumn::make('penggunaan')
                    ->label('Penggunaan')
                    ->limit(50),

                TextColumn::make('desain')
                    ->label('Desain'),

                TextColumn::make('permukaan')
                    ->label('Permukaan'),

                TextColumn::make('sentuhan_akhir')
                    ->label('Sentuhan Akhir'),

                ImageColumn::make('images')
                    ->label('Gambar')
                    ->disk('public')
                    ->getStateUsing(function ($record) {
                        $images = $record->images;
                        return isset($images[0]) ? $images[0] : null;
                    })
                    ->size(60),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
