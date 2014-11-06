=== Plugin ===

Wordpress Plugin with Eloquent configured for Database Management

It reads the database config from wp-config.php and boots up Eloquent. You can use then use Eloquent Models and Fluent query builder
throughout your plugin.


== Migrations ==

This template has barebone migrations support
Place all your migrations under migrations folder. Use the same syntax used in migrations/Dummy.php

To run migrations use: php db.php migrate


== Models ==

Place your eloquent models inside models directory. After creating each model run composer dump-autoload to load the new file. Look into
models/Dummy.php for example usage.