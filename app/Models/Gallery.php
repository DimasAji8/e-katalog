<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'gambar'];

    /**
     * Boot method to add model events.
     */
    protected static function boot()
    {
        parent::boot();

        // Event to handle file deletion
        static::deleting(function ($gallery) {
            // Check if the file exists
            if ($gallery->gambar && Storage::disk('public')->exists($gallery->gambar)) {
                // Delete the file from storage
                Storage::disk('public')->delete($gallery->gambar);
            }
        });
    }
}
