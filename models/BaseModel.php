<?php

use NilPortugues\Sql\QueryBuilder\Builder\GenericBuilder;

class BaseModel
{
	private $table;
	private $db;

	public function __construct($table)
	{
		$this->db = Flight::db();
		$this->table = $table;

	}

	public function findAll()
	{
		$builder = new GenericBuilder();
		$query = $builder->select()->setTable($this->table);
		$request = $builder->writeFormatted($query);
		$query_db = $this->db->query($request);
		return $query_db->fetch_all(MYSQLI_ASSOC);
	}

	public function findById($id)
	{
		$builder = new GenericBuilder();
		$query = $builder->select()->setTable($this->table)
			->where()
			->equals('id', $id)
			->end();
		$request = str_replace(':v1', $id, $builder->writeFormatted($query));
		$query_db = $this->db->query($request);
		return mysqli_fetch_assoc($query_db);
	}


	public function deleteById($id)
	{
		$builder = new GenericBuilder();
		$query = $builder->delete()->setTable($this->table)
			->where()
			->equals('id', $id)
			->end();
		$this->db->query(str_replace(':v1', $id, $builder->writeFormatted($query)));
	}

	public function findWhereLike($field, $value)
	{
		$builder = new GenericBuilder();
		$query = $builder->select()->setTable($this->table)
			->where()
			->like($field, $value)
			->end();
		return str_replace(':v1', $value, $builder->writeFormatted($query));

	}

	public function updateWhere($id, $field, $value)
	{
		$builder = new GenericBuilder();
		$query = $builder->update()->setTable($this->table)
			->setValues([$field => $value])
			->where()
			->equals('id', $id)
			->end();
		$request = str_replace(':v1', '"' . $value . '"', $builder->writeFormatted($query));
		$this->db->query(str_replace(':v2', $id, $request));
	}

	public function deleteWhereLike($field, $value)
	{
		$builder = new GenericBuilder();
		$query = $builder->delete()->setTable($this->table)
			->where()
			->like($field, $value)
			->end();
		return str_replace(':v1', $value, $builder->writeFormatted($query));
	}

}