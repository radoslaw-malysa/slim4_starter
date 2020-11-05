<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Action\Action;
use App\Model\Foresight\Topics;

class ForesightAction extends Action
{

    public function __invoke(Request $request, Response $response, $args) {
        
        return $this->view->render($response, 'scenariusze.html');
    }

    
    public function getTopic(Request $request, Response $response, $args) {
        
        $topic = 
        
        
        $data = array('name' => 'Bob', 'age' => 40);
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

    public function updateFactor(Request $request, Response $response, $args) {
        

        $data = array('name' => 'Bob', 'age' => 40);
        $payload = json_encode($data);

        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', 'http://mysite')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    }

    /**
     * inject contents into parent template as gallery, assets not included
     */
    public function inView(Request $request, Response $response, $args) {
        $this->globals = $this->cms->globals->get();
        $this->meta = $this->cms->meta->get();
        $this->contents = $this->cms->contents->where('id_page', $this->page['id'])->get(['id','slug','title','subtitle','image_url','image_alt','event_date','state'], false, true);
        
        $this->html = $this->view->fetch($this->page['page_view'], array_merge($this->page, ['gallery' => $this->contents], get_object_vars($this)));
        
        return $this->view->render($response, 'layout.php', get_object_vars($this));
    }

    /**
     * render article page
     */
    public function article(Request $request, Response $response, $args) {
        $this->contents =  $this->cms->contents->where('slug', ltrim($request->getUri()->getPath(), '/'))->get();
        if ($this->contents) {
            $this->page = ($this->contents[0]['id_page']) ? $this->cms->pages->where('id', $this->contents[0]['id_page'])->first() : [];
            
            if (is_array($this->contents)) {
                foreach ($this->contents as $content) {
                    $this->html .= $this->view->fetch(($content['view']) ? $content['view'] : $this->default_template(), array_merge($content, get_object_vars($this)));
                }
            }

            return $this->view->render($response, 'layout.php', get_object_vars($this));
        } else {

        }
    }

    protected function default_template() {
        return ($this->page['view']) ? $this->page['view'] : 'default.php';
    }
}
