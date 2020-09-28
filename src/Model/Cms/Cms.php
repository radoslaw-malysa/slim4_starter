<?php

namespace App\Model\Cms;

use App\Model\Cms\Page;


/**
 * Delivery client
 */
class Cms
{
    /**
     * params['scope'] all/preview
     */
    static public function Page($params = [])
    {
        return new Page();
    }

    /**
     * params:
     * collection (default "content")
     * scope: all/preview
     */
    public function Content($param = [])
    {
        return $this->content->select([]);
    }
}