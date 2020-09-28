<?php

declare(strict_types=1);

use App\Action\PageAction;
use Slim\App;


return function (App $app) {
    $app->get('/[{name}]', PageAction::class);
    
};

//composer dump-autoload