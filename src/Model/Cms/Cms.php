<?php

namespace App\Model\Cms;

use App\Model\Repositories\GlobalsRepository;
use App\Model\Repositories\NavsRepository;
use App\Model\Repositories\ContentRepository;
use App\Model\Repositories\AssetsRepository;
use App\Model\Repositories\MetaRepository;

/**
 * Delivery client
 */
class Cms
{
    public $content;
    public $page;
    
    public function __construct(ContentRepository $content, AssetsRepository $assets, NavsRepository $navs, GlobalsRepository $globals, MetaRepository $meta)
    {
        $this->content = $content;
        $this->assets = $assets;
        $this->globals = $globals;
        $this->navs = $navs;
        $this->meta = $meta;
    }

    /**
     * return all variables for route
     * $params: url / id_page
     */
    public function page($params = [])
    {
        if ($params['url']) {
            $nav = $this->navs->where('url', $params['url'])->first();
        }

        if ($nav['id']) {
            $content = $this->content->where('id_nav', $nav['id'])->get();
            $content_count = count($content);

            if ($content_count > 0) {
                for ($i=0; $i < count($content); $i++) {
                    $content[$i] = array_merge($content[$i], $this->assets->where('id_parent', $content[$i]['id'])->groupped());
                }
            }
            
            return [
                'globals' => $this->globals->get(),
                'nav' => $nav,
                'content' => $content,
                'meta' => $this->meta->where('id_nav', $nav['id'])->first()
            ];
        } else {
            return [];
        }
    }
}