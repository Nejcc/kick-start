<?php

namespace Nejcc\KickStart\Providers;

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
            $command->info(' Welcome to Laravel KickStart');
            $command->info(' The following command will modify some files');
            if($command->confirm('Do you wish to continue? (yes|no)[no]',true))
            {
                $prepare->install();
                $command->info('Laravel KickStart was successfuly installed');
            }
            else{
                $command->info("Process terminated by user");
                return;
            }

        });
    }
}
