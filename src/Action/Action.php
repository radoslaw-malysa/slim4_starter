<?php

declare(strict_types=1);

namespace App\Action;

use App\Model\Cms\Client;
use Slim\Views\PhpRenderer;

class Action
{
    protected $view;
    protected $Cms;

    public function __construct(PhpRenderer $view, Client $Cms)
    {
        $this->view = $view;
        $this->Cms = $Cms;
    }
}
