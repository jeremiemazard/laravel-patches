<?php

namespace JeremieMazard\LaravelPatches\Interfaces;

interface PatchInterface
{
    public function run(): bool;
}
