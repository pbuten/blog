<?php

include('./models/Post.php');

class PostRepository
{
	private $model;
	public function __construct()
	{
		$this->model = new Post();
	}

	public static function add($data)
	{
		$post = new Post();
		$post->title = $data['title'];
		$post->content = $data['content'];
		$post->author = $data['author'];
		$post->addPost();
	}

	public static function update($data)
	{
		$post = new Post();
		$post->title = $data['title'];
		$post->content = $data['content'];
		$post->author = $data['author'];
		$post->updateById($data['id']);
	}

	public static function get($id)
	{
		$post = new Post();
		return $post->getById($id);
	}

	public static function remove($id)
	{
		$post = new Post();
		return $post->deletePost($id);
	}

	public static function listAll()
	{
		$post = new Post();
		return $post->displayAll();
	}



}