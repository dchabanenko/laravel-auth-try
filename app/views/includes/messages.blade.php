@if(Session::has('message'))
	<div class="alert {{ Session::get('alert-class') }}" style="margin: 15px;">
    	{{ Session::get('message') }}
    </div>
@endif