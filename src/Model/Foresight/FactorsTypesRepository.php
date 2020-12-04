<?php

namespace App\Model\Foresight;

use PDO;
use App\Model\Foresight\Tables;
use App\Model\Repositories\Repository;

/**
 * Repository.
 */
class FactorsTypesRepository extends Repository
{
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
        $this->model = Tables::FACTORS_TYPES;
    }

    public function topicSelectionEditable($id_topic)
    {
        $this->query = "select t1.* from " . $this->model . " t1 left join " . Tables::TOPICS_FACTORS_TYPES . " t2 on t1.id=t2.id_factor_type 
        where t2.id_topic = '" . $id_topic . "' or t1.standard_type='1'";

        return $this->fetchAll();
    }

    public function topicSelection($id_topic)
    {
        $this->query = "select t1.* from " . $this->model . " t1 left join " . Tables::TOPICS_FACTORS_TYPES . " t2 on t1.id=t2.id_factor_type 
        where t2.id_topic = '" . $id_topic . "'";

        return $this->fetchAll();
    }
}
//https://github.com/illuminate/database/blob/master/Query/Builder.php