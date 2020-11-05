<?php

declare(strict_types=1);

use App\Action\PageAction;
use App\Action\ForesightAction;
use Slim\App;


return function (App $app) {
    
    //foresight scenarios
    $app->get('/scenariusze/{id}', ForesightAction::class);

    $app->get('/api/topic/{id}', ForesightAction::class . ':getTopic');
    $app->post('/api/update_factor', ForesightAction::class . ':updateFactor');
    
    
    $app->get('/[{name}]', PageAction::class);
    
};

//composer dump-autoload