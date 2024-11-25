<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'merk_id',
        'name',
        'description',
        'price',
        'images',
        'ukuran',
        'penggunaan',
        'desain',
        'permukaan',
        'sentuhan_akhir',
    ];

    // Casting untuk kolom images agar diinterpretasikan sebagai array
    protected $casts = [
        'images' => 'array',
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke merk
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'merk_id');
    }

    // Accessor untuk mendapatkan gambar pertama dari kolom images
    public function getFirstImageAttribute()
    {
        if (is_array($this->images) && !empty($this->images)) {
            return data_get($this->images, array_key_first($this->images));
        }

        return null;
    }

    /**
     * Boot method untuk menambahkan event model.
     */
    protected static function boot()
    {
        parent::boot();

        // Event untuk menghapus file terkait saat data dihapus
        static::deleting(function ($product) {
            if (is_array($product->images)) {
                foreach ($product->images as $image) {
                    if (Storage::disk('public')->exists($image)) {
                        Storage::disk('public')->delete($image);
                    }
                }
            }
        });
    }
}
