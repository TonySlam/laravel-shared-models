<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factory;

class LinkModels
{
    public static function link($appPath, $appNamespace)
    {
        $configPath = $appPath . '/config';

        if (file_exists($configPath)) {
            require_once $configPath . '/app.php';
            require_once $configPath . '/database.php';
        }

        $app = app($appNamespace);

        $factory = $app->make(Factory::class);

        Model::setFactory($factory);

        $migrationPath = $appPath . '/database/migrations';

        Model::loadMigrationsFrom($migrationPath);
    }
}
