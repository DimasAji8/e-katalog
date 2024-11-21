<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Actions\Action;
use Filament\Support\Facades\Filament;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationLabel = 'Ulasan';
    protected static ?string $navigationGroup = 'Master';

    // Form untuk input ulasan
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nama'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->label('Email'),
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->label('Isi Ulasan'),
            ]);
    }

    // Tabel untuk menampilkan ulasan di admin panel
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Pengguna'),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('content')->label('Isi Ulasan')->limit(30),
                BooleanColumn::make('is_visible')->label('Ditampilkan')
                    ->alignCenter(), // Menambahkan pengaturan untuk rata tengah
            ])
            ->filters([
                Tables\Filters\Filter::make('Ditampilkan')
                    ->query(fn ($query) => $query->where('is_visible', true)),
            ])
            ->actions([
                // Action untuk menampilkan atau menyembunyikan ulasan
                Action::make('toggleVisibility')
                    ->label(function (Review $review) {
                        return $review->is_visible ? 'Sembunyikan' : 'Tampilkan';
                    })
                    ->action(function (Review $review) {
                        // Toggle the visibility status
                        $review->update(['is_visible' => !$review->is_visible]);
                    })
                    ->color(function (Review $review) {
                        // Jika review ditampilkan, warnanya merah (danger), jika disembunyikan, hijau (success)
                        return $review->is_visible ? 'warning' : 'success';
                    })
                    ->icon(function (Review $review) {
                        // Ubah ikon sesuai dengan status `is_visible`
                        return $review->is_visible ? 'heroicon-o-eye-slash' : 'heroicon-o-eye';
                    }),

                // Action untuk menghapus ulasan
                Action::make('delete')
                    ->label('Hapus')
                    ->action(function (Review $review) {
                        // Hapus review dari database
                        $review->delete();

                       
                    })
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([]); // Hapus bulk action jika tidak diperlukan
    }

    // Tidak ada relasi khusus
    public static function getRelations(): array
    {
        return [];
    }

    // Halaman-halaman yang tersedia
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
        ];
    }
}
