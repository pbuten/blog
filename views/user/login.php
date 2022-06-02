{% extends "template.html" %}

{% block content %}
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {% if ( isAuth == true ) %}
                    <h2>You are logged in already</h2>
                    <a href="/">Go home!</a>
                    <a href="/auth/logout">Log out</a>
                    {% else %}
                    <h2 class="text-center">Log in</h2>
                    <form action="/auth/login" method="post">
                        <div class="form-row">
                            <label class="mt-3">Email</label>
                            <input type="email" name="email" class="form-control"/>

                        </div>
                        <div class="form-row">
                            <label class="mt-3">Password</label>
                            <input type="password" name="password" class="form-control"/>

                        </div>
                        <div class="form-row d-grid gap-2">
                            <input type="submit" class="btn btn-primary btn-block mt-3" value="Submit"/>

                        </div>
                    </form>
                    {% endif %}

                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
