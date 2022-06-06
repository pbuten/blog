{% extends "template.html" %}

{% block content %}
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">

                    <form action="/post/update/{{ id }}" method="POST">
                        <div>
                            <label>Title:</label>
                            <input type="text" name="title" value="{{title}}"/>
                        </div>
                        <div>
                            <label>Author:</label>
                            <input type="text" name="author" value="{{author}}"/>
                        </div>
                        <div>
                            <label>Content:</label>
                            <textarea name="content">{{content}}</textarea>
                        </div>
                        <div>
                            <input type="submit" name="Update">
                        </div>
                    </form>

                    {% if (message != '') %}
                    {{message}}
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
