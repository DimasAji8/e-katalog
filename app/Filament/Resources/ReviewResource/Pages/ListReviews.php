<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use App\Models\Review;

class ListReviews extends ListRecords
{
    protected static string $resource = ReviewResource::class;

    protected function getActions(): array
    {
        return [
            // Hanya menampilkan action untuk menurunkan ulasan
            // Actions\Action::make('Hide')
            //     ->action(fn (Review $review) => $review->update(['is_visible' => false]))
            //     ->color('danger')
            //     ->label('Sembunyikan')
        ];
    }
}
