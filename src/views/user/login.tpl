{% extends 'common/layout.tpl' %}
{% set active = 'account' %}

{% block content %}

	<h1>{{ 'Login'|trans }}</h1>

	{% if error %}
		<div class="alert alert-error">
			{{ error }}
		</div>

		<div class="alert alert-info">
			Try with test@test.com/password.
		</div>
	{% endif %}

	<form action="{{ path('login_check') }}" method="post" novalidate {{ form_enctype(form) }} class="form-vertical">
		{{ form_widget(form) }}
		<div class="form-actions">
			<button type="submit" class="btn btn-primary">{{ 'Send'|trans }}</button>
		</div>
	</form>

{% endblock %}
