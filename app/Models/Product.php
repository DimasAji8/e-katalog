<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_id', 'name', 'description', 'price', 'images'];

    // Casting untuk kolom images agar diinterpretasikan sebagai array
    protected $casts = [
    'images' => 'array',
];


    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Accessor untuk mendapatkan gambar pertama dari kolom images
   public function getFirstImageAttribute()
{
    // Pastikan bahwa images adalah array dan memiliki elemen
    if (is_array($this->images) && !empty($this->images)) {
        return data_get($this->images, array_key_first($this->images));
    }
    
    return null; // Kembalikan null jika images tidak valid atau kosong
}


}
