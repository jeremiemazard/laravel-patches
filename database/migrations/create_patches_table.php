<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('patches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedInteger('number')->unique();
            $table->boolean('ran');
            $table->dateTime('run_date')->nullable();
            $table->nullableTimestamps();
        });
    }

    public function down()
    {
        Schema::drop('patches');
    }
};
