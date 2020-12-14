<?php

namespace App\Model\Foresight;

use PDO;
use App\Model\Foresight\Tables;
use App\Model\Repositories\Repository;

/**
 * Repository.
 */
class ScenariosRepository extends Repository
{
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        $this->model = Tables::SCENARIOS;
    }

    public function insert($data)
    {
        $factors = $data['factors'];
        unset($data['factors']);

        $content = parent::insert($data);
    }
}