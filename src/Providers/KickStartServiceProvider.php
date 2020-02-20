<?php

namespace Nejcc\TailwindPrepare\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Nejcc\KickStart\KickStart;
use Nejcc\TailwindPrepare\TailwindPrepare;

class KickStartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        UiCommand::macro('kickstart', function (UiCommand $command) {
            $prepare = new KickStart();
            $prepare->install();
            $command->info('Laravel KickStart was successfuly installed');
        });
    }
}
