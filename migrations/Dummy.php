<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Dummy {
    public function run() {
        Capsule::schema()->dropIfExists('dummies');
        Capsule::schema()->create('dummies', function($table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->integer('role_id');
            $table->timestamps();
        });
    }
}