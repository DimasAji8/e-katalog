<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\KategoriResource\Pages;
use App\Models\Kategori; // Pastikan ini mengarah ke model Kategori

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder'; // Ganti dengan ikon yang valid
    protected static ?string $navigationLabel = 'Kategori'; // Label di sidebar
     protected static ?string $navigationGroup = 'Master'; // Menambahkan grup
    

    public static function form(Forms\Form $form): Forms\Form
{
    return $form
        ->schema([
            TextInput::make('name')
                ->label('Nama Kategori')
                ->required()
                ->maxLength(255),

            FileUpload::make('gambar')
                ->label('Gambar')
                ->disk('public')
                ->directory('kategori-images') // Direktori penyimpanan gambar
                ->image()
                ->visibility('public')
                ->nullable(), // Tidak wajib diisi

            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(4)
                ->nullable(),
        ]);
}


    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            TextColumn::make('name')
                ->label('Nama Kategori')
                ->sortable()
                ->searchable(),

            ImageColumn::make('gambar')
                ->label('Gambar')
                ->disk('public')
                ->size(60),

            TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->limit(50) // Menampilkan preview deskripsi maksimal 50 karakter
                ->wrap(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }
}
