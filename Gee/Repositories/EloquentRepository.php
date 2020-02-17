<?php
namespace App\Repositories;

abstract class EloquentRepository implements EloquentInterface {
protected $_model;
protected $where;
protected $orWhere;

public function __construct(){
$this->setModel();
}

abstract public function getModel();



public function setModel() {
$this->_model = app($this->getModel());
}

public function getAll() {
	return $this->_model->paginate(10);
}

public function create(array $attributes){
	return $this->_model->create($attributes);
}

public function find($id) {
	return $this->_model->find($id);
}

public function update($id, array $attributes){
	$result = $this->find($id);
	if ($result) {
		$result->update($attributes);
		return $result;
	}
	return false;
}

public function delete($id){
	$result = $this->find($id);
	if ($result) {
		$result->delete();
		return true;
	}
	return false;
}

  public function where($conditions, $operator = null, $value = null)
    {
        if (func_num_args() == 2) {
            list($value, $operator) = [$operator, '='];
        }

        $this->where[] = [$conditions, $operator, $value];

        return $this;
    }

    public function orWhere($conditions, $operator = null, $value = null)
    {
        if (func_num_args() == 2) {
            list($value, $operator) = [$operator, '='];
        }

        $this->orWhere[] = [$conditions, $operator, $value];

        return $this;
    }

     private function loadWhere()
    {
         if (count($this->where)) {
            foreach ($this->where as $where) {
                if (is_array($where[0])) {
                    $this->_model->where($where[0]);
                } else {
                    if (count($where) == 3) {
                        $this->_model->where($where[0], $where[1], $where[2]);
                    } else {
                        $this->_model->where($where[0], '=', $where[1]);
                    }
                }
            }
        }
        if (count($this->orWhere)) {
            foreach ($this->orWhere as $orWhere) {
                if (is_array($orWhere[0])) {
                    $this->_model->orWhere($orWhere[0]);
                } else {
                    if (count($orWhere) == 3) {
                        $this->_model->orWhere($orWhere[0], $orWhere[1], $orWhere[2]);
                    } else {
                        $this->_model->orWhere($orWhere[0], '=', $orWhere[1]);
                    }
                }
            }
        }
    }
    

}