<?php

declare(strict_types=1);

use App\Action\HomeAction;
use Slim\App;

return function (App $app) {
    $app->get('/[{name}]', HomeAction::class);
    
};

//composer dump-autoload