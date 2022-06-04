{% extends '/admin/admin_layout.php' %}

{% block content %}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <form action="/admin/user/updated/{{ userData['id'] }}" method="POST">
                <div class="form-row">
                    <label>E-mail: </label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail"
                           value="{{ userData['email'] }}"/>
                </div>

                <div class="form-row">
                    <label>Password: </label>
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div>

                <div class="form-row">
                    <label>Role: </label>

                    <select name="role" class="form-control">
                        {% for role in roles %}
                        <option value="{{ role.id }}">{{ role.id }}</option>
                        {% endfor %}
                    </select>
                    </select>
                </div>

                <div class="form-row">
                    <input type="submit" class="btn btn-block btn-success mt-3" value="Update user"/>
                </div>
            </form>

        </div>
    </div>
</div>
{% endblock %}