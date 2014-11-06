<?php


class User extends Illuminate\Database\Eloquent\Model{

    protected $fillable = [ 'username', 'password', 'role_id' ];
}