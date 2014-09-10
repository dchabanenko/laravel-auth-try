@extends('layouts.default')

@section('content')

<div class="row">
	<div class="span4 offset1">
		@if($errors->any())
    	    <div class="alert alert-error">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
    		</div>
    	@endif
		<legend> {{ $formCaption }}</legend>
		{{ Form::open() }}
		<table>
		    <tr>
		        <td>name</td>
		        <td>{{ Form::text('name', $feed->name, array('placeholder' => 'Name', 'class' => 'form-control')) }}</td>
		    </tr>
		    <tr>
		        <td>description</td>
		        <td>{{ Form::textarea('description', $feed->description, array('placeholder' => 'Description', 'class' => 'form-control')) }}</td>
		    </tr>
		    <tr>
		        <td>link</td>
		        <td>{{ Form::text('url', $feed->url, array('placeholder' => 'Link', 'class' => 'form-control')) }}</td>
		    </tr>
		    <tr>
		        <td>
		            {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
		        </td>
		    </tr>
		</table>
		{{ Form::close() }}
	</div>
</div>


@stop