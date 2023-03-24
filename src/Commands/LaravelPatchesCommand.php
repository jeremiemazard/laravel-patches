<?php

namespace JeremieMazard\LaravelPatches\Commands;

use Illuminate\Console\Command;

class LaravelPatchesCommand extends Command
{
    public $signature = 'laravel-patches';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
