<?php

namespace App\Model\Foresight;

use PDO;
use App\Model\Foresight\Tables;
use App\Model\Repositories\Repository;

/**
 * Repository.
 */
class FactorsRepository extends Repository
{
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        $this->model = Tables::FACTORS;
    }

}