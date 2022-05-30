<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

{% for post in posts_list %}
<h1>{{post['title']}}</h1>
<h2><b>{{post['author']}}</b></h2>
<p>{{post['content']}}</p>
<a href="/post/update/{{post['id']}}">Edit</a>
<a href="/post/display/{{post['id']}}">View</a>
<a href="/post/delete/{{post['id']}}">Delete</a>
<hr>
{% endfor %}

</body>
</html>