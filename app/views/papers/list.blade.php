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
		<legend>Papers list</legend>
		@if ($papers->count() > 0)

		<table border="1">
		    <tr>
		        <td>Id</td>
		        <td>Title</td>
		        <td>Authors</td>
		        <td>Annotation</td>
		        <td>Link</td>
		        <td>Source</td>
		        <td>Like</td>
		    </tr>
		    @foreach ($papers as $paper)
		    <tr>
		        <td>{{ $paper->id }}</td>
		        <td>{{ $paper->title }}</td>
		        <td>{{ $paper->annote }}</td>
		        <td>{{ $paper->annote }}</td>
		        <td><a href="{{ $paper->url }}" target="_blank">link</a></td>
		        <td><a href="{{ $paper->rssSource->url }}">{{ $paper->rssSource->name }}</a></td>
		        <td><a href="{{ URL::route('papers.like', $paper->id); }}">like</a></td>
		    </tr>
		    @endforeach
		</table>
		<div class="paginate">
        	{{ $papers->links() }}
        </div>
		@else
		   <p>No feeds :(</p>
		@endif
	</div>
</div>


@stop