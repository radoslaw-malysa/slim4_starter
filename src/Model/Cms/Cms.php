<?php

namespace App\Model\Cms;

use App\Model\Repositories\GlobalsRepository;
use App\Model\Repositories\FrameRepository;
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
    public $frame;
    public $meta;
    
    public function __construct(ContentsRepository $contents, AssetsRepository $assets, FrameRepository $frame, GlobalsRepository $globals, MetaRepository $meta)
    {
        $this->contents = $contents;
        $this->assets = $assets;
        $this->globals = $globals;
        $this->frame = $frame;
        $this->meta = $meta;
    }

    /**
     * get all route variables
     * $params: url / id_page
     */
    public function page($params = [])
    {
        if ($params['url']) {
            $frame = $this->frame->where('url', $params['url'])->first();
        }

        if ($frame['id']) {
            $content = ($frame['view']) 
            ? $this->contents->where('id_frame', $frame['id'])->get(['id','slug','title','subtitle','image_url','image_alt','event_date','state'], false, true) 
            : $this->contents->where('id_frame', $frame['id'])->get();
            return [
                'globals' => $this->globals->get(),
                'frame' => $frame,
                'contents' => $content,
                'meta' => $this->meta->where('id_frame', $frame['id'])->first()
            ];
        } else {
            return [];
        }
    }
}