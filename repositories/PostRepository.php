<?php
namespace repositories;
use models\Post;

class PostRepository
{
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