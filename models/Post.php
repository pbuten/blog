<?php

include('BaseModel.php');

class Post
{
	public $title;
	public $content;
	public $author;
	private $db;
	private $base;

	public function __construct()
	{
		$this->base = new BaseModel('posts');
		$this->db = Flight::db();
	}

	public function displayAll()
	{
		return $this->base->findAll();
	}

	public function addPost()
	{
		$query = $this->db->query("INSERT INTO posts (title, content, author) VALUES ('$this->title', '$this->content', '$this->author')");
	}

	public function getById($id)
	{
		return $this->base->findById($id);
	}

	public function updateById($id)
	{
		$this->base->updateWhere($id, 'title', $this->title);
		$this->base->updateWhere($id, 'content', $this->content);
		$this->base->updateWhere($id, 'author', $this->author);
	}

	public function deletePost($id)
	{
		$this->base->deleteById($id);
	}


}