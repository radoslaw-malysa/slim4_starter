<?php

declare(strict_types=1);

use App\Action\PageAction;
use App\Action\ForesightApiAction;
use Slim\App;


return function (App $app) {
    
    //foresight scenarios
    $app->get('/scenariusze/{id}', ForesightAction::class);

    $app->get('/api/topic/{id}', ForesightApiAction::class . ':getTopic');
    $app->any('/api/update_factor', ForesightApiAction::class . ':updateFactor');
    $app->any('/api/update_key_factors', ForesightApiAction::class . ':updateKeyFactors');
    $app->any('/api/update_scenario', ForesightApiAction::class . ':updateScenario');
    
    $app->get('/[{name}]', PageAction::class);
    
};

//composer dump-autoload