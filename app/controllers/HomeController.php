<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    /**
     * Show the home page
     */
    public function showHome()
    {
        return View::make('pages.home');
    }

    /**
     * Show the register form
     */
    public function showRegister()
    {
        if(!Auth::check())
        {
            return View::make('sessions.register');
        } else {
            return Redirect::to('/')->with(array('message' => 'You are already registered.', 'alert-class' => 'alert alert-warning'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function showLogin()
    {
        if(!Auth::check())
        {
            return View::make('sessions.login');
        } else {
            return Redirect::to('/')->with(array('message' => 'You are already logged in.', 'alert-class' => 'alert alert-warning'));
        }
    }

    /**
     * Show the profile for the given user
     */
    public function showProfile($id)
    {
        $user = User::find($id);

        return View::make('pages.user.profile', array('user' => $user));
    }
}
