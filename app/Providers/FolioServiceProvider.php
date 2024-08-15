<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;

class FolioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Folio::path(resource_path('views/pages'))->middleware([
            '*' => [
                //
            ],
        ]);


    
        $modulesPath = base_path('Modules');
        $moduleDirs = File::directories($modulesPath);

        foreach ($moduleDirs as $moduleDir) {
            $viewsPath = $moduleDir . '/resources/views';
            if (File::exists($viewsPath)) {
                $uri = '/modules/' . basename($moduleDir);
                Folio::path($viewsPath)
                    // ->uri($uri)
                    ->middleware([
                        '*' => [
                            // Add your middleware here if needed
                        ],
                    ]);
            }
        }

    }
}
