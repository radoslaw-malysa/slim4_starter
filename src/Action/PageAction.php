<?php

declare(strict_types=1);

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Action\Action;

class PageAction extends Action
{
    protected $collection;
    protected $globals;
    protected $meta;
    protected $contents;
    protected $html = '';

    public function __invoke(Request $request, Response $response, $args) {
        
        $this->page = $this->cms->pages->where('slug', ltrim($request->getUri()->getPath(), '/'))->first();

        if ($this->page) {
            return ($this->page['page_view']) ? $this->inView($request, $response, $args) : $this->inLayout($request, $response, $args);
        } else {
            return $this->article($request, $response, $args);
        }
    }

    /**
     * render components
     */
    public function inLayout(Request $request, Response $response, $args) {
        $this->globals = $this->cms->globals->get();
        $this->meta = $this->cms->meta->get();
        $this->contents = $this->cms->contents->where('id_page', $this->page['id'])->get();
        
        if (is_array($this->contents)) {
            foreach ($this->contents as $content) {
                $this->html .= $this->view->fetch(($content['view']) ? $content['view'] : $this->default_template(), array_merge($content, get_object_vars($this)));
            }
        }

        return $this->view->render($response, 'layout.php', get_object_vars($this));
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


    /**
     * foresight homepage
     */
    public function fsHomepage(Request $request, Response $response, $args) {
        /*$this->globals = $this->cms->globals->get();
        $this->meta = $this->cms->meta->get();
        $this->contents = $this->cms->contents->where('id_page', $this->page['id'])->get();
        
        if (is_array($this->contents)) {
            foreach ($this->contents as $content) {
                $this->html .= $this->view->fetch(($content['view']) ? $content['view'] : $this->default_template(), array_merge($content, get_object_vars($this)));
            }
        }*/

        $time_horizons = $this->cms->timeHorizons->orderBy('years')->get();
        $topics_areas = $this->cms->topicsAreas->orderBy('id')->get();

        $header = $this->view->fetch('foresight/header.php', [
            'edit_mode' => false,
            'time_horizons' => $time_horizons,
            'topics_areas' => $topics_areas
        ]);
        $hero = $this->view->fetch('foresight/hero.php', [
            'topics' => $this->cms->topics->where('state', '1')->orderBy('create_time', 'desc')->limit(9)->get(),
            'time_horizons' => $this->cms->indexArray($time_horizons),
            'topics_areas' => $this->cms->indexArray($topics_areas)
        ]);
        $footer = $this->view->fetch('foresight/footer.php');

        $content = $header.$hero.$footer;

        return $this->view->render($response, 'foresight/layout_page.php', ['content' => $content]);
    }

    /**
     * foresight topics
     */
    public function fsTopics(Request $request, Response $response, $args) {

        $time_horizons = $this->cms->timeHorizons->orderBy('years')->get();
        $topics_areas = $this->cms->topicsAreas->orderBy('id')->get();

        $header = $this->view->fetch('foresight/header.php', [
            'edit_mode' => false,
            'time_horizons' => $time_horizons,
            'topics_areas' => $topics_areas
        ]);

        $topics = $this->view->fetch('foresight/topics.php', [
            'topics' => $this->cms->topics->where('state', '1')->orderBy('create_time', 'desc')->get(),
            'time_horizons' => $this->cms->indexArray($time_horizons),
            'topics_areas' => $this->cms->indexArray($topics_areas)
        ]);
        $footer = $this->view->fetch('foresight/footer.php');

        $content = $header.$topics.$footer;

        return $this->view->render($response, 'foresight/layout_page.php', ['content' => $content]);
    }

    /**
     * foresight find topics
     */
    public function fsFindTopics(Request $request, Response $response, $args) {

        $data = $request->getQueryParams();

        return $this->view->render($response, 'foresight/topics_list.php', [
            'topics' => $this->cms->topics
            ->where('state', '1')
            ->where('topic_area', ($data['topic_area']) ? $data['topic_area'] : null)
            ->where('title', 'like', ($data['title']) ? '%'.$data['title'].'%' : null)
            ->orderBy('create_time', ($data['order'] == 'created_asc') ? 'asc' : 'desc')->get()
        ]);
    }

    /**
     * foresight topic
     */
    public function fsTopic(Request $request, Response $response, $args) {
        $time_horizons = $this->cms->timeHorizons->orderBy('years')->get();
        $topics_areas = $this->cms->topicsAreas->orderBy('id')->get();

        $header = $this->view->fetch('foresight/header.php', [
            'edit_mode' => '1',
            'time_horizons' => $time_horizons,
            'topics_areas' => $topics_areas
        ]);

        $footer = $this->view->fetch('foresight/footer.php');

        return $this->view->render($response, 'foresight/layout_topic.php', [
            'id' => $args['id'],
            'header' => $header, 
            'footer' => $footer
        ]);
    }


}
//https://www.youtube.com/c/LachlanMiller/videos