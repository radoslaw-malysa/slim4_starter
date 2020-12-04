<?php

declare(strict_types=1);

namespace App\Action;

use App\Model\Cms\Cms;
use Slim\Views\PhpRenderer;

class Action
{
    protected $view;
    protected $cms;

    public function __construct(PhpRenderer $view, Cms $cms)
    {
        $this->view = $view;
        $this->cms = $cms;
    }
}
