<?php
namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $navigationLabel = 'Kontak'; // Ganti label menjadi Admins

    // Mengelompokkan resource di sidebar
    protected static ?string $navigationGroup = 'Management'; // Menambahkan grup


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('whatsapp')
                    ->label('WhatsApp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('youtube')
                    ->label('YouTube')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook')
                    ->label('Facebook')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tiktok')
                    ->label('TikTok')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('maps')
                    ->label('Maps')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shopee')
                    ->label('Shopee')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tokped')
                    ->label('Tokopedia')
                    ->nullable()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube')
                    ->label('YouTube')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->label('Facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tiktok')
                    ->label('TikTok')
                    ->searchable(),
                Tables\Columns\TextColumn::make('maps')
                    ->label('Maps')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shopee')
                    ->label('Shopee')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tokped')
                    ->label('Tokopedia')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),  // Hanya sediakan aksi Edit
            ])
            ->bulkActions([]);
    }
     public static function canCreate(): bool
    {
        // Mencegah penambahan data jika sudah ada data tentang
        return Kontak::count() === 0;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKontaks::route('/'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
            // Hapus atau komentar baris berikut untuk menonaktifkan halaman create
            // 'create' => Pages\CreateKontak::route('/create'),
        ];
    }
}
