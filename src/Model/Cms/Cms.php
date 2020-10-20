<?php

namespace App\Model\Cms;

use App\Model\Repositories\GlobalsRepository;
use App\Model\Repositories\PagesRepository;
use App\Model\Repositories\ContentsRepository;
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
    public $pages;
    public $meta;
    
    public function __construct(ContentsRepository $contents, AssetsRepository $assets, PagesRepository $pages, GlobalsRepository $globals, MetaRepository $meta)
    {
        $this->contents = $contents;
        $this->assets = $assets;
        $this->globals = $globals;
        $this->pages = $pages;
        $this->meta = $meta;
    }

}