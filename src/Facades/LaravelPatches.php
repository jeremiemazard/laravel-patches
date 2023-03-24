<?php

namespace JeremieMazard\LaravelPatches\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JeremieMazard\LaravelPatches\LaravelPatches
 */
class LaravelPatches extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \JeremieMazard\LaravelPatches\LaravelPatches::class;
    }
}
