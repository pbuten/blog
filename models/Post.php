<?php

class Post
{
	public $title;
	public $content;
	public $author;
	private $db;

	public function __construct()
	{
		$this->db = Flight::db();
	}

	public function addPost()
	{
		$query = $this->db->query("INSERT INTO posts (title, content, author) VALUES ('$this->title', '$this->content', '$this->author')");
	}

	public function getById($id)
	{
		$query = $this->db->query("SELECT * FROM posts WHERE id = '$id'");
		$row = mysqli_fetch_assoc($query);
		return $row;
	}

	public function updateById($id)
	{
		$query = $this->db->query("UPDATE posts SET title = '$this->title', content = '$this->content', author = '$this->author' WHERE id = '$id'");
	}

	public function deletePost($id)
	{
		$query = $this->db->query("DELETE FROM posts WHERE id = '$id'");
	}

	public function displayAll()
	{
		$query = $this->db->query("SELECT * FROM posts");
		return $query->fetch_all(MYSQLI_ASSOC);
	}
}