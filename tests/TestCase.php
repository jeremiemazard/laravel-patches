<?php

namespace JeremieMazard\LaravelPatches\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use JeremieMazard\LaravelPatches\LaravelPatchesServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'JeremieMazard\\LaravelPatches\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelPatchesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-patches_table.php.stub';
        $migration->up();
        */
    }
}
