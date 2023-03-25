<?php

namespace JeremieMazard\LaravelPatches;

use JeremieMazard\LaravelPatches\Commands\LaravelPatchesCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelPatchesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-patches')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-patches_table')
            ->hasCommand(LaravelPatchesCommand::class);
    }
}
