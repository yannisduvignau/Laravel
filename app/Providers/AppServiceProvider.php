<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);

        // Vérifie si l'application est en mode de développement avec php artisan serve
        /* if ($this->app->environment('local')) { */
            // Réinitialise la base de données et exécute le seeder
            Artisan::call('migrate:fresh');
            //Artisan::call('db:seed');

            // Exécute npm run dev avec un délai d'attente de 300 secondes (5 minutes)
            /* $process = new Process(['npm', 'run', 'dev']);
            $process->setTimeout(300); // 300 secondes (5 minutes)
            $process->run(); */

            // Vérifie si une erreur s'est produite lors de l'exécution de la commande
            /* if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            } */
        //}
    }
}
