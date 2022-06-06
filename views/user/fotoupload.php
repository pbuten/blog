{% extends "template.html" %}

{% block content %}
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h2 class="text-center">Upload photo</h2>
					<form action="/profile/photo" method="post" enctype="multipart/form-data">
						<div class="form-row">
							<label class="mt-3">Select file</label>
							<input type="file" name="file" class="form-control"/>
						</div>
						<div class="form-row d-grid gap-2">
							<input type="submit" class="btn btn-primary btn-block mt-3" value="Submit"/>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
{% endblock %}
