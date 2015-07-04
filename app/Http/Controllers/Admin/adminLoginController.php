<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Api\Controller;

use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class AdminLoginController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      //
  }

  /**
   * show admin login form
   * 
   * @return view
   */
  public function showLogin()
  {
      // show admin login form
    return view('admin/login');
  }

  /**
   * process the form
   * 
   * @return 
   */
  public function doLogin()
  {
      // validate the info, create rules for the inputs
    $rules = array(
      'username'    => 'required', // make sure the email is an actual email
      'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    );

    // run the validation rules on the inputs from the form
    $validator = Validator::make(Input::all(), $rules);

    // if the validator fails, redirect back to the form
    if ($validator->fails()) {
      return Redirect::to('admin/login')
      ->withErrors($validator) // send back all errors to the login form
      ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    } else {
      // create our user data for the authentication
      // only admin type could login
      $userdata = array(
        'username'     => Input::get('username'),
        'password'     => Input::get('password'),
        'type'         => 'admin'
      );

      // attempt to do the login
      if (Auth::attempt($userdata)) {
        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
        return Redirect::to('admin');
      } else {        
        // validation not successful, send back to form 
        // if Auth::attempt fails (wrong credentials) create a new message bag instance.
        $errors = new MessageBag(['password' => ['Username and/or password invalid.']]); 
        return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
      }
    }
  }

  /**
   * logout of ou app
   * 
   * @return 
   */
  public function doLogout() 
  {
    // log the user out of our app
    Auth::logout();
    // redirect the user to the login screen
    return Redirect::to('/admin/login');
  }

}
