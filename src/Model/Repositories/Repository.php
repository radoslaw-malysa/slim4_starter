<?php

namespace App\Model\Repositories;

use App\Model\Repositories\Paginator;

/**
 * Repository.
 */
class Repository
{
    protected $connection;
    protected $model;
    protected $query;

    protected $columns = [];
    protected $joins = [];
    protected $wheres = [];
    protected $orders = [];

    protected $limit;
    protected $offset;

    public function select($columns = ['*'])
    {
        //$this->columns = [];
        $this->columns = is_array($columns) ? $columns : [$columns];
        
        return $this;
    }

    public function addSelect($columns = ['*'])
    {
        if ($this->columns[0]) {
            array_push($this->columns, is_array($columns) ? $columns : [$columns]);
        } else {
            $this->columns = is_array($columns) ? $columns : [$columns];
        }
        
        return $this;
    }

    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '=';
        }
        
        if (isset($value)) {
            $this->wheres[] = compact(
                'column', 'operator', 'value', 'boolean'
            );
        }

        return $this;
    }

    public function get($columns = ['*'])
    {
        $this->select($columns);
        $this->buildSelect();
        
        $st = $this->connection->prepare($this->query);
        $st->execute();

        return $this->result($st->fetchAll());
    }

    public function first($columns = ['*'])
    {
        $this->select($columns);
        $this->buildSelect();
        
        $st = $this->connection->prepare($this->query);
        $st->execute();

        return $this->result($st->fetch());
    }

    protected function buildSelect()
    {
        $this->query = "select ";
        
        if (count($this->columns) > 0) {
            $this->query .= implode(', ', $this->columns);
        }

        $this->query .= " from " . $this->model . ' ';

        if (count($this->joins) > 0) {
            $this->query .= implode(' ', $this->joins);
        }

        if (count($this->wheres) > 0) {
            $this->query .= ' where ';

            foreach ($this->wheres as $key => $where) {
                $this->query .= ($key > 0) ? $where['boolean'] . ' ': '';
                $this->query .= $where['column'] . ' ' . $where['operator'] . " '" . $where['value'] . "' ";
            }
        }

        if (count($this->orders) > 0) {
            $this->query .= ' order by ';
            foreach ($this->orders as $key => $order) {
                $this->query .= ($key > 0) ? ', ' : '';
                $this->query .= $order['column'] . ' ' . $order['order'] . ' ';
            }
        }
        
        if ($this->limit) {
            $this->query .= 'limit ' . (($this->offset) ? $this->offset : '0') . ', ' . $this->limit;
        }
        //echo '<br>' . $this->query; exit;
    }

    public function orderBy($column, $order = 'asc')
    {
        $this->orders[] = compact(
            'column', 'order'
        );
        return $this;
    }

    public function offset($quantity)
    {
        $this->offset = $quantity;
        return $this;
    }

    public function limit($quantity)
    {
        $this->limit = $quantity;
        return $this;
    }

    public function count()
    {

    }

    public function max()
    {

    }

    public function find($id)
    {

    }

    /**
     * joins
     */
    public function join($table, $first, $operator = null, $second = null, $type = 'inner', $where = false)
    {
        $method = $where ? 'where' : 'on';

        $this->joins[] = $type . " join " . $table . " " . $method . " " . $first . " " . $operator ." " . $second . " ";

        return $this;
    }

    public function leftJoin($table, $first, $operator = null, $second = null)
    {
        return $this->join($table, $first, $operator, $second, 'left');
    }

    public function rightJoin($table, $first, $operator = null, $second = null)
    {
        return $this->join($table, $first, $operator, $second, 'right');
    }


    protected function result($result)
    {
        $this->wheres = $this->joins = $this->orders = [];
        return $result;
    }

    public function insert($data)
    {
        $placeholders = substr(str_repeat('?,', count($data)), 0, -1);
        $this->query = "INSERT INTO " . $this->model . " (" . implode(',', array_keys($data)) . ") VALUES (" . $placeholders . ")";
        
        $st = $this->connection->prepare($this->query);
        $st->execute(array_values($data));
        
        return $this->connection->lastInsertId();

        //$this->guery = "INSERT INTO " . $this->model . " (" . implode(', ', array_keys($data)) . ") VALUES (" . implode(', ', array_values($data)) . ")";
    }

    public function update($data)
    {
        $this->query = "UPDATE " . $this->model . " SET " . implode(", ", array_map(function($v){ return "$v=?"; }, array_keys($data))); //. " WHERE email = ?"
        
        if (count($this->wheres) > 0) {
            $this->query .= ' where ';

            foreach ($this->wheres as $key => $where) {
                $this->query .= ($key > 0) ? $where['boolean'] . ' ': '';

                $this->query .= ($where['operator'] == 'IN') ? $where['column'] . ' ' . $where['operator'] . "('" . implode("','", $where['value']) . "') " : $where['column'] . $where['operator'] . "'" . $where['value'] . "' ";
                //$this->query .= $where['column'] . $where['operator'] . "'" . $where['value'] . "' ";
            }
        }
        //echo $this->query.'<br>';
        $st = $this->connection->prepare($this->query);
        $st->execute(array_values($data));
        
        return $this->result(true);
        
        //implode(", ", array_map(function($v){ return "$v=?"; }, array_keys($first)));
    }

    public function delete()
    {
        $this->query = "DELETE FROM " . $this->model;
        
        if (count($this->wheres) > 0) {
            $this->query .= ' where ';

            foreach ($this->wheres as $key => $where) {
                $this->query .= ($key > 0) ? $where['boolean'] . ' ': '';

                $this->query .= ($where['operator'] == 'IN') ? $where['column'] . ' ' . $where['operator'] . "('" . implode("','", $where['value']) . "') " : $where['column'] . $where['operator'] . "'" . $where['value'] . "' ";
            }
        }
        
        $st = $this->connection->prepare($this->query);
        $st->execute();
        
        return $this->result(true);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function fetchAll()
    {
        $st = $this->connection->prepare($this->query);
        $st->execute();

        return $this->result($st->fetchAll());
    }

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null, $urlPattern = null)
    {
        $perPage = $perPage ?: 50;
        
        if (!$page) {
            $page = (isset($_GET[$pageName])) ? $_GET[$pageName] : 1;
        }
        
        if (!$urlPattern) {
            $query = $_GET;
            unset($query[$pageName]);
            $urlPattern =  '?' . ((count($query) > 0) ? http_build_query($query) . '&' : '') . $pageName . '=(:num)';
            //$_SERVER['SCRIPT_URI']
        }
        
        //count
        $this->select('count(*)');
        $this->buildSelect();
        $st = $this->connection->prepare($this->query);
        $st->execute();
        $totalItems = $st->fetchColumn();

        $paginator = new Paginator([], $totalItems, $perPage, $page, $urlPattern);

        //result
        $this->select($columns);
        $this->offset = $paginator->getCurrentPageFirstItem();
        $this->limit = $perPage;
        $this->buildSelect();
        
        $st = $this->connection->prepare($this->query);
        $st->execute();

        $paginator->setResults($st->fetchAll());

        return $paginator;
    }

    //https://websitebeaver.com/php-pdo-prepared-statements-to-prevent-sql-injection
    ////$parameters = preg_replace('/&page(=[^&]*)?|^page(=[^&]*)?&?/','', $parameters);
    //https://medium.com/swlh/how-to-implement-cursor-pagination-like-a-pro-513140b65f32
}