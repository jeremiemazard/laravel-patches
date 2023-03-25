<?php

namespace JeremieMazard\LaravelPatches\Exceptions;

class PatchRunnerNotFoundException extends \Exception
{
    private string $patchName;
    private string $className;

    private function __construct(string $message = '')
    {
        parent::__construct($message);
    }

    public static function create(string $patchName, string $className): self
    {
        return (new static("No patch file found for patch {$patchName} (looked for '{$className}')."))
            ->setPatchName($patchName)
            ->setClassName($className);
    }

    public function getPatchName(): string
    {
        return $this->patchName;
    }

    public function setPatchName(string $patchName): self
    {
        $this->patchName = $patchName;
        return $this;
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
