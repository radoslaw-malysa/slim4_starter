<?php

namespace App\Model\Repositories;

use PDO;
use App\Model\Repositories\Tables;
use App\Model\Repositories\Repository;
use App\Model\Repositories\AssetsRepository;

/**
 * Repository.
 */
class ContentRepository extends Repository
{
    public function __construct(PDO $connection, AssetsRepository $assets)
    {
        $this->connection = $connection;
        $this->model = Tables::CONTENT;
        $this->assets = $assets;
    }

    /**
     * @param array  $columns
     * @param bool $add_assets
     */
    public function get($columns = ['*'], $add_assets = true)
    {
        $content = parent::get($columns);
        if ($add_assets) {
            $content_count = count($content);

            if ($content_count > 0) {
                for ($i=0; $i < $content_count; $i++) {
                    $content[$i] = array_merge($content[$i], $this->assets->where('id_parent', $content[$i]['id'])->groupped());
                    $content[$i]['view'] = json_decode($content[$i]['view'], true);
                }
            }
        }
        return $content;
    }
}