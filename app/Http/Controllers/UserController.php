<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use \Validator;

class UserController extends Controller
{
	public function login()
	{
		if (Request::isMethod('post')) {
			$validator = Validator::make(Input::all(),
				['name' => User::$rules['name'], 'password' => User::$rules['password']]);

			if ($validator->fails()) {
				return Redirect::to('/login')
					->withErrors($validator)
					->withInput();
			} else {

				$user = User::where('name', '=', Input::get('name'))->first();

				if($user != null && Hash::check(Input::get('password'), $user->password)) {
					Session::put('name', $user->name);
					Session::put('id', $user->id);
					return Redirect::to('/')
						->with('message',
							'Everything went great! You have signed in!');
				} else {
					return Redirect::to('/login')
						->withErrors("Account with this user doesn't exists!")
						->withInput();
				}
			}
		} else {
			return view('user.login');
		}
	}

	public function registration()
	{
		if (Request::isMethod('post')) {
			$validator = Validator::make(Input::all(), User::$rules);

			if ($validator->fails()) {
				//$messages = $validator->messages();
				return Redirect::to('/registration')
					->withErrors($validator)
					->withInput();
			} else {

				if(User::where('name', '=', Input::get('name'))->count() > 0) {
					return Redirect::to('/registration')
						->withErrors("Account with this user already exists! Try another name!")
						->withInput();
				}

				$user = new User();
				$user->name     = Input::get('name');
				$user->email    = Input::get('email');
				$user->password = Hash::make(Input::get('password'));

				$user->save();

				return Redirect::to('/registration')
					->with('message', 'Everything went great! You have created account!');
			}
		} else {
			return view('user.registration');
		}
	}

	public function logout()
	{
		Session::forget('name');
		Session::forget('id');
	}
}