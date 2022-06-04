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
                    <h4>Email: {{ userData['email'] }}</h4>

				</div>
			</div>
		</div>
	</div>
</div>
{% endif %}
{% endblock %}
