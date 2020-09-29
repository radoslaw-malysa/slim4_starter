<?php

namespace App\Model\Repositories;

use PDO;
use App\Model\Repositories\Tables;
use App\Model\Repositories\Repository;

/**
 * Repository.
 */
class AssetsRepository extends Repository
{
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        $this->model = Tables::ASSETS;
    }

    public function groupped($columns = ['*'])
    {
        $grouped = [];
        foreach ($this->get($columns) as $asset) {
            $grouped[$asset['type']][] = $asset;
        }

        return $grouped;
    }
}