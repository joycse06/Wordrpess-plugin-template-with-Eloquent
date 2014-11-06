<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Users {
    public function run() {
        Capsule::schema()->dropIfExists('users');
        Capsule::schema()->create('users', function($table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->integer('role_id');
            $table->timestamps();
        });
    }
}