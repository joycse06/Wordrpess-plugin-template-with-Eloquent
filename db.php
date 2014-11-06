#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

require_once __DIR__.'/Eloquent.php';

define("DB_MIGRATION_SCHEMA_PATH", __DIR__."/migrations");

class Db {

    public function __construct($args) {
        $this->args = $args;
    }

    private function help() {
        echo "usage: php " . $this->args[0] . " <command> [<args>]\n";
    }

    public function run() {
        if (count($this->args) <= 1) {
            $this->help();
        } else {
            switch ($this->args[1]) {
                case "migrate":
                    $this->runMigrations();
                    break;
                case "help":
                case "--help":
                    $this->help();
                    break;
            }
        }
    }

    private function runMigrations() {
        $files = glob(DB_MIGRATION_SCHEMA_PATH.'/*.php');
        foreach ($files as $file) {
            echo "Migrating File : ".$file."\n";
            require_once($file);
            $class = basename($file, '.php');
            $migration = new $class;
            $migration->run();
        }
    }
}

$db = new Db($argv);
$db->run();
?>