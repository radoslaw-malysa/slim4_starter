<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Action\Action;

class PageAction extends Action
{
    public function __invoke(Request $request, Response $response, $args) {
        
        $page = $this->cms->page(['url' => $request->getUri()->getPath()]);
        
        $html = '';
        if (is_array($page['content'])) {
            foreach ($page['content'] as $content) {
                $html .= $this->view->fetch('hello.php', array_merge($content, ['globals' => $page['globals']]));
            }
        }

        return $this->view->render($response, 'layout.php', [
            'content' => $html,
            'meta' => $page['meta'],
            'globals' => $page['globals']
        ]);
    }

}
