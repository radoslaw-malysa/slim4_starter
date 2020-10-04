<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Slim\Views\PhpRenderer;
use Psr\Container\ContainerInterface;

return static function (ContainerBuilder $containerBuilder, array $settings) {
    $containerBuilder->addDefinitions([
        'settings' => $settings,
        
        PhpRenderer::class => function (ContainerInterface $container) {
            $settings = $container->get('settings');
            return new PhpRenderer($settings['view_path'], ['upl' => $settings['upl']]);
        },

        PDO::class => function (ContainerInterface $container) {
            $settings = $container->get('settings');
            return new PDO(
                "mysql:host=".$settings['db_host'].";dbname=".$settings['db_database'].";charset=".$settings['db_charset'], 
                $settings['db_username'], 
                $settings['db_password'], 
                array(
                    PDO::ATTR_EMULATE_PREPARES => true,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.$settings['db_charset'].' COLLATE '.$settings['db_collation']
                )
            );
        },
        
    ]);
};
