@extends('layouts.default')

@section('content')

<div class="row">
	<div class="span4 offset1">
		<div class="well">
			<legend>Login</legend>
			{{ Form::open(array('route' => 'sessions.store')) }}

			@if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif

			{{ Form::text('email', '', array('placeholder' => 'Email', 'class' => 'form-control')) }}<br />
			{{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control', 'value' => Input::old('password'))) }}<br />


			<div class="btn-toolbar">
				{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
				{{ HTML::link('/', 'Cancel', array('class' => 'btn btn-danger pull-right')) }}
				{{ HTML::link('register', 'Register', array('class' => 'btn btn-primary pull-right')) }}
			</div>

			{{ Form::token() . Form::close() }}
		</div>
	</div>
</div>


@stop