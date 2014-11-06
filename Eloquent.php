<?php
include_once __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Pimple\Container;


// This container can be used as global object or config storage
$container = new Container();

if(!defined('DB_HOST')){

    require_once dirname(dirname(dirname(dirname(( __FILE__ )))))."/wp-config.php";
}

$container['config'] = array(
    'driver'    => 'mysql',
    'host'      => DB_HOST,
    'port'      => null,
    'database'  => DB_NAME,
    'username'  => DB_USER,
    'password'  => DB_PASSWORD,
    'prefix'    => $table_prefix ,
    'charset'   => DB_CHARSET,
    'collation' => strlen(DB_COLLATE)?:'utf8_general_ci'
);

/**
 * Configure the database and boot Eloquent
 */


$capsule = new Capsule;

$capsule->addConnection($container['config']);

$capsule->setAsGlobal();
$capsule->bootEloquent();
// set timezone for timestamps etc
date_default_timezone_set('UTC');



/* Eloquent configured */