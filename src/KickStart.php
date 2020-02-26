<?php

namespace Nejcc\KickStart;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset as LaravelUI;

class KickStart extends LaravelUI
{
    public function install()
    {
        $this->prepare();

    }

    public function prepare()
    {
        static::ensureComponentDirectoryExists();

        $this->overrideEnv();
        $this->createSqliteDB();
        $this->populateMigrations();
        $this->updateSeeders();
        $this->overrideModels();
        $this->overrideAuthServiceProvider();
        $this->addLocalization();
        $this->appendWebRoute();
    }

    protected function overrideEnv(){
        $this->push('.env','.env');
    }

    protected function createSqliteDB(){
        $this->push('database/database.sqlite','database/database.sqlite');
    }

    protected function updateSeeders(){
        $this->push('database/seeds/DatabaseSeeder.php','database/seeds/DatabaseSeeder.php');
        $this->push('database/seeds/RolesTableSeeder.php','database/seeds/RolesTableSeeder.php');
        $this->push('database/seeds/UserTableSeeder.php','database/seeds/UserTableSeeder.php');
    }

    private function push($tempPath, $newPath)
    {
        return copy(__DIR__ . '/Temp/' . $tempPath, base_path('/' . $newPath));
    }

    protected function populateMigrations()
    {
        $this->push('database/migrations/2014_10_12_000000_create_users_table.php','database/migrations/2014_10_12_000000_create_users_table.php');
        $this->push('database/migrations/2014_10_12_000001_create_roles_table.php','database/migrations/2014_10_12_000001_create_roles_table.php');
        $this->push('database/migrations/2014_10_12_000002_create_role_user_table.php','database/migrations/2014_10_12_000002_create_role_user_table.php');
        $this->push('database/migrations/2014_10_12_000003_create_foren_keys_for_role_user_table.php','database/migrations/2014_10_12_000003_create_foren_keys_for_role_user_table.php');
    }

    protected function overrideModels()
    {
        if (!is_dir(base_path('/app/Models'))) {
            mkdir(base_path('/app/Models'));
        }

        $this->push('app/models/Role.php','app/Models/Role.php');
        $this->push('app/models/User.php','app/User.php');
    }

    protected function addLocalization()
    {
        $this->push('app/http/middlewares/Localization.php','app/Http/Middleware/Localization.php');
    }

    protected function overrideAuthServiceProvider()
    {
        $this->push('app/providers/AuthServiceProvider.php','app/Providers/AuthServiceProvider.php');
    }

    protected function appendWebRoute()
    {
        file_put_contents(base_path('/routes/web.php'), file_get_contents(__DIR__ . '/Temp/routes/web.php'), FILE_APPEND);
    }

}
