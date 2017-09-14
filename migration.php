<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;
//Eloquent ORM или Illuminate database
require_once "config.php";

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('email', 100);
        $table->string('password', 100)->nullable();
        $table->integer('vk_id')->nullable();
        $table->timestamps(); //created_at и updated_at
});
