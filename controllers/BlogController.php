<?php
include('./models/Post.php');

class BlogController
{
	public static function add()
	{
		$request = Flight::request();
		$message = '';
		if (!empty ($request->data->content)) {
			$post = new Post();
			$post->title = $request->data->title;
			$post->content = $request->data->content;
			$post->author = $request->data->author;
			$post->addPost();
			$message = 'Post was successfully added';
		}
		Flight::view()->display('post/add.php', [
			'message' => $message
		]);
	}

	public static function display($id)
	{
		$request = Flight::request();
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
		$post = new Post();
		$post_data = $post->deletePost($id);
		echo 'Post was successfully deleted';
	}

	public static function update($id)
	{
		$request = Flight::request();
		$post = new Post();
		$post_data = $post->getById($id);
		$message = '';

		if (!empty ($request->data->content)) {
			$post_edited = new Post();
			$post_edited->title = $request->data->title;
			$post_edited->content = $request->data->content;
			$post_edited->author = $request->data->author;
			$post_edited->updateById($id);
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
		$posts = new Post();
		$posts_list = $posts->displayAll();
		Flight::view()->display('post/list.php', [
			'posts_list' => $posts_list
		]);
	}
}