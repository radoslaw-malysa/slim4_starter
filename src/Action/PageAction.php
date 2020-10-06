<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Action\Action;

class PageAction extends Action
{
    protected $page;

    public function __invoke(Request $request, Response $response, $args) {
        
        $this->page = $this->cms->page(['url' => $request->getUri()->getPath()]);

        if ($this->page['frame']['view']) {
            return $this->listPage($request, $response, $args);
        } else {
            return $this->landingPage($request, $response, $args);
        }
    }

    /**
     * landing page
     */
    public function landingPage(Request $request, Response $response, $args) {
        $html = '';
        if (is_array($this->page['contents'])) {
            foreach ($this->page['contents'] as $content) {
                $html .= $this->view->fetch($content['view'], array_merge($content, ['globals' => $this->page['globals']], get_object_vars($this->cms)));
            }
        }

        return $this->view->render($response, 'layout.php', [
            'content' => $html,
            'meta' => $this->page['meta'],
            'globals' => $this->page['globals']
        ]);
    }

    /**
     * (automat) list of contents, no assets data
     */
    public function listPage(Request $request, Response $response, $args) {
        $html = $this->view->fetch($this->page['frame']['view'], array_merge($this->page['frame'], ['gallery' => $this->page['contents'], 'globals' => $this->page['globals']], get_object_vars($this->cms)));
        
        return $this->view->render($response, 'layout.php', [
            'content' => $html,
            'meta' => $this->page['meta'],
            'globals' => $this->page['globals']
        ]);
    }

    /**
     * (automat) one article
     */
    public function articlePage(Request $request, Response $response, $args) {

    }
}
