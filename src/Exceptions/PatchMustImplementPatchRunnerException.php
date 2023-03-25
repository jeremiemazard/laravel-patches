<?php

namespace JeremieMazard\LaravelPatches\Exceptions;

class PatchMustImplementPatchRunnerException extends \Exception
{
    private string $className;

    private function __construct(string $message = '')
    {
        parent::__construct($message);
    }

    public static function create(string $className): self
    {
        return (new static("Class {$className} does not implement JeremieMazard\LaravelPatches\Interfaces\PatchRunner."))
            ->setClassName($className);
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function setClassName(string $className): self
    {
        $this->className = $className;
        return $this;
    }
}
