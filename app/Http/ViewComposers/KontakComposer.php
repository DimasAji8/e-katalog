<?php

// app/Http/ViewComposers/KontakComposer.php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Kontak;

class KontakComposer
{
    public function compose(View $view)
    {
        // Ambil data kontak pertama
        $kontak = Kontak::first();

        // Jika ada data, bersihkan URL untuk sosial media
        if ($kontak) {
            $kontak->youtube = preg_replace('#https?://#', '', $kontak->youtube ?? '');
            $kontak->tiktok = preg_replace('#https?://#', '', $kontak->tiktok ?? '');
            $kontak->facebook = preg_replace('#https?://#', '', $kontak->facebook ?? '');
            $kontak->shopee = preg_replace('#https?://#', '', $kontak->shopee ?? '');
            $kontak->tokped = preg_replace('#https?://#', '', $kontak->tokped ?? '');
        }

        // Membagikan data kontak ke semua view
        $view->with('kontak', $kontak);
    }
}
