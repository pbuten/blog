{% extends "template.html" %}

{% block content %}
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            {% for post in posts_list %}
            <div class="card">
                <div class="card-body">
                    <h1>{{post['title']}}</h1>
                    <h2><b>{{post['author']}}</b></h2>
                    <p>{{post['content']}}</p>
                    <a href="/post/update/{{post['id']}}">Edit</a>
                    <a href="/post/display/{{post['id']}}">View</a>
                    <a href="/post/delete/{{post['id']}}">Delete</a>
                </div>
            </div>
            {% endfor %}
        </div>
    </div>
</div>
{% endblock %}

