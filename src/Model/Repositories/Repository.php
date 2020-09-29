<?php

namespace App\Model\Repositories;

/**
 * Repository.
 */
class Repository
{
    protected $connection;
    protected $model;
    protected $query;

    public $columns;
    public $joins;
    public $wheres = [];
    public $orders;

    public function select($columns = ['*'])
    {
        $this->columns = [];
        $this->columns = is_array($columns) ? $columns : [$columns];
        
        return $this;
    }

    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '=';
        }

        $this->wheres[] = compact(
            'column', 'operator', 'value', 'boolean'
        );

        return $this;
    }

    public function get($columns = ['*'])
    {
        $this->select($columns);
        $this->buildSelect();
        
        $st = $this->connection->prepare($this->query);
        $st->execute();

        return $st->fetchAll();
    }

    public function first($columns = ['*'])
    {
        $this->select($columns);
        $this->buildSelect();
        
        $st = $this->connection->prepare($this->query);
        $st->execute();

        return $st->fetch();
    }

    protected function buildSelect()
    {
        $this->query = "select ";
        
        if (count($this->columns) > 0) {
            $this->query .= implode(', ', $this->columns);
        }

        $this->query .= " from " . $this->model;

        if (count($this->wheres) > 0) {
            $this->query .= ' where ';

            foreach ($this->wheres as $key => $where) {
                $this->query .= ($key > 0) ? $where['boolean'] . ' ': '';
                $this->query .= $where['column'] . $where['operator'] . "'" . $where['value'] . "' ";
            }
        }
    }

    public function limit()
    {

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
}