<?php

declare(strict_types=1);

use App\Action\PageAction;
use App\Action\ForesightApiAction;
use Slim\App;


return function (App $app) {
    
    //foresight scenarios
    $app->get('/tematy/{id}', PageAction::class . ':fsTopic');
    $app->get('/tematy/{id}/scenariusze', PageAction::class . ':fsTopic');

    $app->get('/api/topic/{id}', ForesightApiAction::class . ':getTopic');
    $app->any('/api/update_topic', ForesightApiAction::class . ':updateTopic');
    $app->any('/api/update_factor', ForesightApiAction::class . ':updateFactor');
    $app->any('/api/delete_factor', ForesightApiAction::class . ':deleteFactor');
    $app->any('/api/update_key_factors', ForesightApiAction::class . ':updateKeyFactors');
    $app->any('/api/update_scenario', ForesightApiAction::class . ':updateScenario');
    
    $app->get('/[{name}]', PageAction::class);
    
};

//composer dump-autoload