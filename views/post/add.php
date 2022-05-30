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

<form action="/post/create" method="POST">
    <div>
        <label>Title:</label>
        <input type="text" name="title"/>
    </div>
    <div>
        <label>Author:</label>
        <input type="text" name="author"/>
    </div>
    <div>
        <label>Content:</label>
        <textarea name="content"></textarea>
    </div>
    <div>
        <input type="submit" name="Submit">
    </div>
</form>

{% if (message != '') %}
{{message}}
{% endif %}



</body>
</html>

