<?php

namespace App\Model\Repositories;

use PDO;
use App\Model\Repositories\Tables;
use App\Model\Repositories\Repository;
use App\Model\Repositories\AssetsRepository;

/**
 * Repository.
 */
class ContentsRepository extends Repository
{
    public function __construct(PDO $connection, AssetsRepository $assets)
    {
        $this->connection = $connection;
        $this->model = Tables::CONTENTS;
        $this->assets = $assets;
    }

    /**
     * @param array  $columns
     * @param bool $join_assets
     * @param bool $add_more_links
     */
    public function get($columns = ['*'], $join_assets = true, $add_more_url = false)
    {
        $content = parent::get($columns);
        if ($join_assets) {
            $content = $this->join_assets($content);
        }
        if ($add_more_url) {
            $content = $this->add_more_url($content);
        }
        
        return $content;
    }

    /**
     * add related assets to contents
     */
    public function join_assets($content)
    {
        $content_count = count($content);
        if ($content_count > 0) {
            for ($i=0; $i < $content_count; $i++) {
                if ($content[$i]['related']) {
                    $content[$i] = array_merge($content[$i], $this->$content[$i]['related']);
                } else {
                    $content[$i] = array_merge($content[$i], $this->assets->where('id_parent', $content[$i]['id'])->groupped());
                }
                
                $content[$i]['view_settings'] = json_decode($content[$i]['view_settings'], true);
            }
        }

        return $content;
    }

    /**
     * replace primary_url with link to full article
     */
    public function add_more_url($contnt)
    {
        $content_count = count($content);
        if ($content_count > 0) {
            for ($i=0; $i < $content_count; $i++) {
                $content[$i]['primary_url'] = '/' . $content[$i]['slug'];
                $content[$i]['primary_text'] = 'Zobacz więcej';
            }
        }

        return $content;
    }
}