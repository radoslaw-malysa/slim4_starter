<?php

declare(strict_types=1);

return static function(string $appEnv) {
    //dev
    $settings =  [
        'app_env' => $appEnv,
        'di_compilation_path' => __DIR__ . '/../var/cache',
        'display_error_details' => false,
        'log_errors' => true,
        'view_path' => __DIR__ . '/../src/View',
        'db_driver' => 'mysql',
        'db_host' => 'localhost',
        'db_username' => 'root', 
        'db_database' => 'cms', 
        'db_password' => '', 
        'db_charset' => 'utf8',
        'db_collation' => 'utf8_polish_ci',
        'upl' => 'img/'
    ];

    //prod
    /*$settings =  [
        'app_env' => $appEnv,
        'di_compilation_path' => __DIR__ . '/../var/cache',
        'display_error_details' => false,
        'log_errors' => true,
        'view_path' => __DIR__ . '/../src/View',
        'db_driver' => 'mysql',
        'db_host' => 'crynparpush.mysql.db',
        'db_username' => 'crynparpush', 
        'db_database' => 'crynparpush', 
        'db_password' => 'Stupid627', 
        'db_charset' => 'utf8',
        'db_collation' => 'utf8_polish_ci',
        'upl' => 'img/'
    ];*/

    if ($appEnv === 'DEVELOPMENT') {
        // Overrides for development mode
        $settings['di_compilation_path'] = '';
        $settings['display_error_details'] = true;
        $settings['logger']['path'] = __DIR__ . '/../var/log/app.log';
    }

    return $settings;
};
