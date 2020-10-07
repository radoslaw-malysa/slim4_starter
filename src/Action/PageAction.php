<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Action\Action;

class PageAction extends Action
{
    protected $menu;
    protected $globals;
    protected $meta;
    protected $contents;
    protected $html = '';

    public function __invoke(Request $request, Response $response, $args) {
        
        $this->menu = $this->cms->menu->where('slug', ltrim($request->getUri()->getPath(), '/'))->first();

        if ($this->menu) {
            return ($this->menu['page_view']) ? $this->inView($request, $response, $args) : $this->inLayout($request, $response, $args);
        } else {
            return $this->article($request, $response, $args);
        }
    }

    /**
     * render contents templates in layout
     */
    public function inLayout(Request $request, Response $response, $args) {
        $this->globals = $this->cms->globals->get();
        $this->meta = $this->cms->meta->get();
        $this->contents = $this->cms->contents->where('id_menu', $this->menu['id'])->get();
        
        if (is_array($this->contents)) {
            foreach ($this->contents as $content) {
                $this->html .= $this->view->fetch(($content['view']) ? $content['view'] : $this->default_template(), array_merge($content, get_object_vars($this)));
            }
        }

        return $this->view->render($response, 'layout.php', get_object_vars($this));
    }

    /**
     * inject contents into parent template as gallery, no assets data
     */
    public function inView(Request $request, Response $response, $args) {
        $this->globals = $this->cms->globals->get();
        $this->meta = $this->cms->meta->get();
        $this->contents = $this->cms->contents->where('id_menu', $this->menu['id'])->get(['id','slug','title','subtitle','image_url','image_alt','event_date','state'], false, true);
        
        $this->html = $this->view->fetch($this->menu['page_view'], array_merge($this->menu, ['gallery' => $this->contents], get_object_vars($this)));
        
        return $this->view->render($response, 'layout.php', get_object_vars($this));
    }

    /**
     * render article page
     */
    public function article(Request $request, Response $response, $args) {
        $this->contents =  $this->cms->contents->where('slug', ltrim($request->getUri()->getPath(), '/'))->get();
        if ($this->contents) {
            $this->menu = ($this->contents[0]['id_menu']) ? $this->cms->menu->where('id', $this->contents[0]['id_menu'])->first() : [];
            
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
        return ($this->menu['view']) ? $this->menu['view'] : 'default.php';
    }
}
