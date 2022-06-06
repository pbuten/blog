{% extends "template.html" %}

{% block content %}
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1>{{title}}</h1>
                    <h2 style="color: blue">{{author}}</h2>
                    <p>{{content}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
