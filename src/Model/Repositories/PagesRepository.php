<?php

namespace App\Model\Repositories;

use PDO;
use App\Model\Repositories\Tables;
use App\Model\Repositories\Repository;

/**
 * Repository.
 */
class PagesRepository extends Repository
{
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        $this->model = Tables::PAGES;
    }

    
}