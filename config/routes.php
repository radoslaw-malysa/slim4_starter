<?php

declare(strict_types=1);

use App\Action\PageAction;
use App\Action\ForesightApiAction;
use App\Action\AdminAction;
//use App\Action\ForesightPrintAction;
use Slim\App;


return function (App $app) {
    
    //web routes for vue app
    $app->get('/tematy/{id}', PageAction::class . ':fsTopic');
    $app->get('/tematy/{id}/scenariusze', PageAction::class . ':fsTopic');
    $app->get('/tematy/{id}/scenariusze/{nr}', PageAction::class . ':fsTopic');

    //$app->get('/tematy/{id}/wydruk', ForesightPrintAction::class);

    //admin
    $app->post('/admin/login', AdminAction::class . ':login');
    $app->get('/admin/logout', AdminAction::class . ':logout');
    $app->get('/admin/session', AdminAction::class . ':session');
    $app->post('/admin/user', AdminAction::class . ':saveUser');

    //api
    $app->get('/api/topic/{id}', ForesightApiAction::class . ':getTopic');
    $app->any('/api/add_topic_type', ForesightApiAction::class . ':addTopicType');
    $app->any('/api/create_add_topic_type', ForesightApiAction::class . ':createAddTopicType');
    $app->any('/api/del_topic_type', ForesightApiAction::class . ':delTopicType');
    $app->any('/api/update_topic', ForesightApiAction::class . ':updateTopic');
    $app->any('/api/update_factor', ForesightApiAction::class . ':updateFactor');
    $app->any('/api/delete_factor', ForesightApiAction::class . ':deleteFactor');
    $app->any('/api/update_key_factors', ForesightApiAction::class . ':updateKeyFactors');
    $app->any('/api/update_scenario', ForesightApiAction::class . ':updateScenario');
    $app->any('/api/update_scenario_factors', ForesightApiAction::class . ':updateScenarioFactors');
    $app->get('/api/find_topic', PageAction::class . ':fsFindTopics');

    $app->get('/tematy', PageAction::class . ':fsTopics');
    $app->get('/[{name}]', PageAction::class . ':fsHomepage');
    //$app->get('/[{name}]', PageAction::class);
    
};

//composer dump-autoload