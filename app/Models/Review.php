<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Menambahkan kolom yang bisa diisi secara massal
    protected $fillable = ['name', 'email', 'content', 'is_visible'];

}
