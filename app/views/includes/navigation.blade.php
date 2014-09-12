<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::route('home') }}">CiteHub - personal arXiv citation manager</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="{{ (Request::is('/')) ? 'active' : '' }}"><a href="{{ URL::to('/') }}">Home</a></li>
    @if (Auth::check())
      <li class="{{ (Route::current()->getPath() == 'user/{id}/profile') ? 'active' : '' }}"><a href="{{ URL::to('user/' . Auth::user()->id . '/profile') }}">Profile</a></li>
      <li class="{{ (Route::current()->getPath() == URL::route('feeds.index', 'all')) ? 'active' : '' }}"><a href="{{ URL::route('feeds.index', 'all') }}">Sources</a></li>
    @else
      <li class="{{ Request::is( 'register') ? 'active' : '' }}"><a href="{{ URL::to('register') }}">Register</a></li>
    @endif
    </ul>
	@if (!Auth::check())
    <a href="{{ URL::to('login') }}" class="btn btn-default navbar-btn pull-right">Sign in</a>
	@else
    <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">{{ Auth::user()->email }}</a></p>
    <a href="{{ URL::to('logout') }}" class="btn btn-default navbar-btn pull-right">Logout</a>
	@endif
  </div>
</nav>