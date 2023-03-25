<?php

namespace JeremieMazard\LaravelPatches\Interfaces;

interface PatchRunner
{
    public const SUCCESS = 0;

    public const FAILURE = 1;

    public function run();
}
