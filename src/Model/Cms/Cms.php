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
    public $assets;
    public $globals;
    public $navs;
    public $meta;
    
    public function __construct(ContentRepository $content, AssetsRepository $assets, NavsRepository $navs, GlobalsRepository $globals, MetaRepository $meta)
    {
        $this->content = $content;
        $this->assets = $assets;
        $this->globals = $globals;
        $this->navs = $navs;
        $this->meta = $meta;
    }

    /**
     * get all route variables
     * $params: url / id_page
     */
    public function page($params = [])
    {
        if ($params['url']) {
            $nav = $this->navs->where('url', $params['url'])->first();
        }

        if ($nav['id']) {
            return [
                'globals' => $this->globals->get(),
                'nav' => $nav,
                'content' => $this->content->where('id_nav', $nav['id'])->get(),
                'meta' => $this->meta->where('id_nav', $nav['id'])->first()
            ];
        } else {
            return [];
        }
    }
}