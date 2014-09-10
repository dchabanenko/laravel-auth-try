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
		<legend>Feeds list</legend>
		@if ($feeds->count() > 0)
		<table border="1">
		    <tr>
		        <td>id</td>
		        <td>name</td>
		        <td>description</td>
		        <td>external link</td>
		        <td>refresh</td>
		        <td>edit</td>
		        <td>delete</td>
		    </tr>
		    @foreach ($feeds as $feed)
		    <tr>
		        <td>{{ $feed->id }}</td>
		        <td>{{ $feed->name }}</td>
		        <td>{{ $feed->description }}</td>
		        <td><a target=_blank href="{{ $feed->url }}">{{ $feed->url }}</a></td>
		        <td><a href="#">refresh</a></td>
		        <td>
   		            @if (Auth::check() && ($feed->creator == Auth::user()->id))
       		            <a href="{{ URL::route('feeds.edit', $feed->id); }}">edit</a>
                    @else
        	             --
                	@endif
		        <td>
		            @if (Auth::check() && ($feed->creator == Auth::user()->id))
		            <a href="{{ URL::route('feeds.delete', $feed->id); }}">delete</a>
		            @else
		             --
		            @endif
		        </td>
		    </tr>
		    @endforeach
		</table>
		<div class="paginate">
        	{{ $feeds->links() }}
        </div>
		@else
		   <p>No feeds :(</p>
		@endif

		@if (Auth::check())
		<a href="{{ URL::route('feeds.create') }}">Add a new feed</a>
		@endif
	</div>
</div>


@stop