<?php

namespace JeremieMazard\LaravelPatches\Models;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use JeremieMazard\LaravelPatches\Exceptions\PatchMustImplementPatchRunnerException;
use JeremieMazard\LaravelPatches\Exceptions\PatchRunnerNotFoundException;
use JeremieMazard\LaravelPatches\Interfaces\PatchInterface;
use JeremieMazard\LaravelPatches\Interfaces\PatchRunner;

class Patch extends Model implements PatchInterface
{
    public bool $autoplay = true;
    protected $fillable = [
        'name',
        'description',
        'number',
        'ran',
        'run_date',
    ];
    protected $casts = [
        'run_date' => 'datetime'
    ];

    /**
     * @throws BindingResolutionException
     * @throws PatchMustImplementPatchRunnerException
     * @throws PatchRunnerNotFoundException
     */
    public function run(): bool
    {
        $runner = static::resolvePatchRunner();
        return $runner->run();
    }

    /**
     * @throws BindingResolutionException
     * @throws PatchMustImplementPatchRunnerException
     * @throws PatchRunnerNotFoundException
     */
    private function resolvePatchRunner(): PatchRunner
    {
        $namespace = config('patches.namespace', 'App\Patches');
        $patchName = config('patches.class_prefix', 'Patch') . $this->number;
        $class = "{$namespace}\\{$patchName}";

        if (!class_exists($class)) {
            throw PatchRunnerNotFoundException::create($patchName, $class);
        }

        if (!is_subclass_of($class, PatchRunner::class)) {
            throw PatchMustImplementPatchRunnerException::create($class);
        }

        return app()->make($class);
    }

    public function getTable()
    {
        return config('patches.table', 'patches');
    }


}
