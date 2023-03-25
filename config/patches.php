<?php

return [
    /**
     * The name of the database table
     */
    'table' => 'patches',

    /**
     * The namespace where your patch-classes are located.
     * No trailing slashes
     */
    'namespace' => 'App\Patches',

    /**
     * The class prefix is used for discovering the classes used as
     * PatchRunners. The patch's number is appended to the prefix.
     * With the default prefix of 'Patch', your classes should
     * be named 'Patch{number}' (e.g.: Patch001).
     */
    'class_prefix' => 'Patch'
];
