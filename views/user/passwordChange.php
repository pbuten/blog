{% extends "template.html" %}

{% block content %}
{% if ( isAuth == false ) %}
<h2>You are not logged in!</h2>
<a href="/login">Login here</a>
<a href="/">Home page</a>
{% else %}
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Email:  {{ session['email'] }}</h4>
                </div>
                <form action="/profile/password" method="post">
                    <div class="form-row">
                        <label class="mt-3">Enter new password</label>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    <div class="form-row d-grid gap-2">
                        <input type="submit" class="btn btn-primary btn-block mt-3" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{% endif %}
{% endblock %}
