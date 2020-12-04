<?php

namespace App\Model\Cms;

use App\Model\Repositories\GlobalsRepository;
use App\Model\Repositories\PagesRepository;
use App\Model\Repositories\ContentsRepository;
use App\Model\Repositories\AssetsRepository;
use App\Model\Repositories\MetaRepository;
//foresight repositories
use App\Model\Foresight\TopicsRepository;
use App\Model\Foresight\TopicsAreasRepository;
use App\Model\Foresight\TimeHorizonsRepository;

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

    //foresight module

    
    public function __construct(
        ContentsRepository $contents, 
        AssetsRepository $assets, 
        PagesRepository $pages, 
        GlobalsRepository $globals, 
        MetaRepository $meta,
        TopicsRepository $topics,
        TopicsAreasRepository $topicsAreas,
        TimeHorizonsRepository $timeHorizons
    )
    {
        $this->contents = $contents;
        $this->assets = $assets;
        $this->globals = $globals;
        $this->pages = $pages;
        $this->meta = $meta;
        $this->topics = $topics;
        $this->topicsAreas = $topicsAreas;
        $this->timeHorizons = $timeHorizons;
    }

    public function indexArray($array, $column = 'id')
    {
        $indexed = [];
        foreach ($array as $row) {
            $indexed[$row[$column]] = $row;
        }
        return $indexed;
    }
}