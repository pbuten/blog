{% extends '/admin/admin_layout.php' %}

{% block content %}
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2>List of users</h2>
				<hr>
				<div class="mb-3">
					<a href="/admin/user/create" class="btn btn-sm btn-success">
						Create user
					</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				
				<table class="table">
					<thead>
						<tr>
							<th scope="col-2">ID</th>
							<th scope="col-3">E-mail</th>
							<th scope="col-3">Role</th>
							<th scope="col-3">Options</th>
						</tr>
					</thead>
					<tbody>
						{% for user in users %}
							<tr>
								<td>{{ user.id }}</td>
								<td>{{ user.email }}</td>
								<td>{{ user.role }}</td>
								<td>
									<a href="/admin/user/edit/{{ user.id }}">
										Edit
									</a>/
									<a href="/admin/user/delete/{{ user.id }}" class="btn btn-sm btn-danger">
										Delete
									</a>
								</td>
							</tr>
						{% endfor %}
					</tbody>
				</table>
			
			</div>
		</div>
	</div>
{% endblock %}