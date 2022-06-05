<?php

namespace controllers;

use Flight;
use models\Post;
use repositories\PostRepository;

class BlogController
{

	public static function add()
	{
		$request = Flight::request();
		$message = '';
		if (!empty ($request->data->content)) {
			PostRepository::add([
				'title' => $request->data->title,
				'content' => $request->data->content,
				'author' => $request->data->author
		]);

			$message = 'Post was successfully added';
		}
		Flight::view()->display('post/add.php', [
			'message' => $message
		]);
	}

	public static function display($id)
	{
		$post = new Post();
		$post_data = $post->getById($id);

		Flight::view()->display('post/display.php', [
			'title' => $post_data['title'],
			'content' => $post_data['content'],
			'author' => $post_data['author']
		]);

	}

	public static function delete($id)
	{
		PostRepository::remove($id);
		echo 'Post was successfully deleted';
	}

	public static function update($id)
	{
		$request = Flight::request();
		$post_data = PostRepository::get($id);
		$message = '';

		if (!empty ($request->data->content)) {
			PostRepository::update([
				'id' => $id,
				'title' => $request->data->title,
				'content' => $request->data->content,
				'author' => $request->data->author
			]);

			$message = 'Post was successfully updated';
		}
		Flight::view()->display('post/update.php', [
			'title' => $post_data['title'],
			'content' => $post_data['content'],
			'author' => $post_data['author'],
			'message' => $message,
			'id' => $id
		]);

	}

	public static function list()
	{
		$posts_list = PostRepository::listAll();
		Flight::view()->display('post/list.php', [
			'posts_list' => $posts_list
		]);
	}
}