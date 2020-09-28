<?php

namespace App\Model\Cms;

use App\Model\Repositories\ContentRepository;


/**
 * Delivery client
 */
class Page
{
    protected $content;

    public function __construct(ContentRepository $content)
    {
        $this->content = $content;
    }

    /**
     * params['scope'] all/preview
     */
    public function get($param = [])
    {
        return $this->content->select([]);
    }

    /**
     * params:
     * collection (default "content")
     * scope: all/preview
     */
    public function getContent($param = [])
    {
        return $this->content->select([]);
    }
}