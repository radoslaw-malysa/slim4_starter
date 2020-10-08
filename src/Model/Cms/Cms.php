<?php

namespace App\Model\Cms;

use App\Model\Repositories\GlobalsRepository;
use App\Model\Repositories\CollectionsRepository;
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
    public $collections;
    public $meta;
    
    public function __construct(ContentsRepository $contents, AssetsRepository $assets, CollectionsRepository $collections, GlobalsRepository $globals, MetaRepository $meta)
    {
        $this->contents = $contents;
        $this->assets = $assets;
        $this->globals = $globals;
        $this->collections = $collections;
        $this->meta = $meta;
    }

}