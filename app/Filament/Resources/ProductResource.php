<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\ProductResource\Pages;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Produk'; // Label di sidebar
     protected static ?string $navigationGroup = 'Master'; // Menambahkan grup

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Select::make('kategori_id')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')->required()->maxLength(255),
                Textarea::make('description')->maxLength(500),
                TextInput::make('price')->numeric()->required(),
                FileUpload::make('images')
                    ->multiple()
                    ->disk('public') // Menyimpan file di disk 'public'
                    ->directory('product-images') // Direktori penyimpanan
                    ->image()
                    ->maxSize(1024) // Ukuran maksimum per gambar (KB)
                    ->minFiles(1)
                    ->maxFiles(5) // Jumlah maksimum gambar yang diizinkan
                    ->storeFileNamesIn('images'), // Menyimpan nama file di kolom 'images'
            ]);
    }

   public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('category.name')->label('Category'),
            TextColumn::make('price')->sortable(),
             ImageColumn::make('first_image') // Kolom gambar sekarang di sebelah kolom nama
                ->disk('public')
                ->label('Image')
                ->size(60)
              
           
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
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
