<?php
namespace App\Repositories;

interface EloquentInterface {
	public function getAll();
	public function create(array $attributes);
	public function find($id);
	public function update($id, array $attributes);
	public function delete($id);
	public function where($conditions, $operator = null, $value = null);
    public function orWhere($conditions, $operator = null, $value = null);
}