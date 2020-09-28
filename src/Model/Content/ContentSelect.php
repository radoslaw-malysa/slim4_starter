<?php

namespace App\Model\Content;

use App\Model\Tables;
use PDO;

/**
 * Repository.
 */
class ContentSelect
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Select content
     *
     * @param array $params content
     *
     * @return array list of content
     */
    public function select(array $params): array
    {
        $sql = "select * from ".Tables::CONTENT."
        order by ord";

        $st = $this->connection->query($sql);

        return $st->fetchAll();
    }
}