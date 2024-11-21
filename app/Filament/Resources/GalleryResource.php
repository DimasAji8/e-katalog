<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    protected static ?string $navigationLabel = 'Galeri'; // Label di sidebar
    protected static ?string $navigationGroup = 'Master'; // Menambahkan grup

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')  // Kolom untuk judul gambar
                    ->label('Judul')
                    ->required()  // Menandakan bahwa kolom ini wajib diisi
                    ->maxLength(255),
                Forms\Components\FileUpload::make('gambar')
    ->label('Gambar')
    ->image()
    ->disk('public')
    ->directory('gallery-images')
    ->maxSize(1024)
    ->required()
    ->visibility('public')  // Memastikan file bisa diakses publik

            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')  // Menampilkan kolom judul
                    ->sortable()  // Bisa diurutkan
                    ->searchable(),  // Bisa dicari
                Tables\Columns\ImageColumn::make('gambar')  // Menampilkan gambar
                    ->disk('public')  // Mengambil gambar dari disk 'public'
                    ->label('Image')  // Label untuk kolom gambar
                    ->size(60),  // Ukuran gambar yang ditampilkan di tabel
            ])
            ->filters([
                // Filter jika diperlukan
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
        return [
            // Tambahkan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
