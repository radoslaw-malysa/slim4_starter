<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Model\Cms\Client;
use Slim\Views\PhpRenderer;

class HomeAction
{
    protected $view;
    protected $CmsClient;

    public function __construct(PhpRenderer $view, Client $CmsClient)
    {
        $this->view = $view;
        $this->CmsClient = $CmsClient;
    }

    public function __invoke(Request $request, Response $response, $args) {
        
        $html_content = '';
        foreach ($this->CmsClient->getContent() as $content) {
            $html_content .= $this->view->fetch('hello.php', array_merge($content));
        }

        return $this->view->render($response, 'layout.php', [
            'content' => $html_content
        ]);
    }

}
