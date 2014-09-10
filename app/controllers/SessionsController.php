<?php

class SessionsController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$rules = array(
	        'email'    => array('required', 'email'),
	        'password' => array('required', 'min:7')
	    );

	    $validation = Validator::make($input, $rules);

	    if ($validation->fails())
	    {
	        // Validation has failed.
	       	return Redirect::back()->with(array('message' => 'Something went wrong with the validation.', 'alert-class'=>'alert-warning'))->withInput()->withErrors($validation);
	    }

	    // Validation has succeeded. Create new user.

		$attempt = Auth::attempt([
			'email' => $input['email'],
			'password' => $input['password']
		]);

		// Login successful
		if($attempt) return Redirect::intended('/')->with(array('message' => 'You have been logged in.', 'alert-class'=>'alert-success'));

		// else
		return Redirect::back()->with(array('message' => 'Invalid credentials.', 'alert-class'=>'alert-danger'))->withInput();
		
	}

	public function postRegister()
	{
		$input = Input::all();

		$rules = array('email' => 'required|unique:users', 'password' => 'required');

		$v = Validator::make($input, $rules);

		if($v->passes())
		{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->email = $input['email'];
			$user->password = $password;
			$user->save();

			return Redirect::to('login')->withInput()->with(array('message' => 'The user has been registered. Please log in.', 'alert-class'=>'alert-warning'));
		} else {

			return Redirect::to('register')->withInput()->withErrors();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::home()->with(array('message' => 'You have been logged out.', 'alert-class'=>'alert-success'));
	}

}