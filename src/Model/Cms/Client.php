<?php

namespace App\Model\Cms;

use App\Model\Content\ContentSelect;

/**
 * Delivery client
 */
class Client
{
    protected $content;

    public function __construct(ContentSelect $content)
    {
        $this->content = $content;
    }
    /**
     * params['scope'] all/preview
     */
    public function getContent($param = [])
    {
        return $this->content->select([]);
    }
}