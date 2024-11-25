<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class SetupProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup the project environment';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up the project...');

        // Buat storage link
        $this->call('storage:link');
        $this->info('Storage symlink created.');

        // Daftar folder yang perlu dipastikan keberadaannya
        $directories = [
            'storage/app/public/gallery-images',
            'storage/app/public/product-images',
            'storage/app/public/kategori-images',
            'storage/app/public/merk-images',
            'storage/app/public/artikel-images',
        ];

        // Perulangan untuk memastikan setiap folder dibuat dan memiliki .gitkeep
        foreach ($directories as $directory) {
            if (!File::exists($directory)) {
                File::ensureDirectoryExists($directory);
                File::put("$directory/.gitkeep", '');
                $this->info("Directory $directory created with .gitkeep.");
            } else {
                $this->info("Directory $directory already exists.");
            }
        }

        $this->info('Project setup complete!');
    }
}
