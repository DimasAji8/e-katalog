<?php
namespace App\Filament\Resources;

use App\Filament\Resources\TentangResource\Pages;
use App\Models\Tentang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TentangResource extends Resource
{
    protected static ?string $model = Tentang::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Tentang'; // Ganti label menjadi Tentang
    protected static ?string $navigationGroup = 'Management'; // Menambahkan grup

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('isi')
                    ->required()
                    ->maxLength(65535), // Sesuaikan panjang sesuai kebutuhan
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi')
                    ->label('Isi')
                    ->limit(50) // Batasi tampilan teks hanya 50 karakter
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Hanya menyediakan aksi edit
                // Tidak ada aksi delete
            ])
            ->bulkActions([]); // Tidak ada aksi massal
    }

    public static function canCreate(): bool
    {
        // Mencegah penambahan data jika sudah ada data tentang
        return Tentang::count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTentangs::route('/'),
            'create' => Pages\CreateTentang::route('/create'),
            'edit' => Pages\EditTentang::route('/{record}/edit'),
        ];
    }
}
