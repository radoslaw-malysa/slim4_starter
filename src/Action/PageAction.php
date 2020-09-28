<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Action\Action;

class PageAction extends Action
{
    public function __invoke(Request $request, Response $response, $args) {
        
        //$page = $this->Cms->getPage(['url' => '']); //arr
        
        
        $html_content = '';
        foreach ($this->cms->getContent([]) as $content) {
            $html_content .= $this->view->fetch('hello.php', array_merge($content));
        }

        return $this->view->render($response, 'layout.php', [
            'content' => $html_content
        ]);
    }

}
