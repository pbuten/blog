{% extends '/admin/admin_layout.php' %}

{% block content %}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			
				<form action="/admin/user/create" method="POST">
					<div class="form-row">
						<label>E-mail: </label>
						<input type="email" name="email" class="form-control" placeholder="E-mail" />
					</div>
					
					<div class="form-row">
						<label>Password: </label>
						<input type="password" name="password" class="form-control" placeholder="Password" />
					</div>
					
					<div class="form-row">
						<input type="submit" class="btn btn-block btn-success mt-3" value="Создать нового пользователя" />
					</div>
				</form> 
			
			</div>
		</div>
	</div>
{% endblock %}