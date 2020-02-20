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
        static::updatePackages();

        $this->createSqliteDB();
        $this->updateSeeders();
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

}
