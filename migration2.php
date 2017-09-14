<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;
//Eloquent ORM или Illuminate database
require_once "config.php";

Capsule::schema()->table('users', function (Blueprint $table) {
        $table->integer('role')->default(0);
});
//port forwarding - как прокинуть порт