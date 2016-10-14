<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Filter;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
	public function index()
	{
		return view('user.profile', ['user' => User::findOrFail(Session::get('id'))]);
	}

	public function addAds()
	{
		if(!Session::get('id')) abort(403, 'Must be signed in');
		$validator = Validator::make(Input::all(), Ad::$rules);
		if ($validator->fails()) {
			return Redirect::to('/ads/list')
				->withErrors($validator)
				->withInput();
		} else {
			$ad = new Ad();
			$ad->brand_car_name = Input::get('brand_car_name');
			$ad->model_name = Input::get('model_name');
			$ad->year_issue = Input::get('year_issue');
			$ad->mileage = Input::get('mileage');
			$ad->price = Input::get('price');
			$ad->description = Input::get('description');
			$ad->user_id = Session::get('id');
			$ad->save();

			return Redirect::to('/ads/list')
				->with('message', 'Everything went great! You have added ad!');
		}
	}

	public function controlFilters()
	{
		if(!Session::get('id')) abort(403, 'Must be signed in');
		$filters = User::find(Session::get('id'))->filters;
		return view('user.profile', ['filters' => $filters]);
	}

	public function addFilters()
	{
		if(!Session::get('id')) abort(403, 'Must be signed in');
		$validator = Validator::make(Input::all(), Filter::$rules);
		if ($validator->fails()) {
			return Redirect::to('/profile/filters/control')
				->withErrors($validator)
				->withInput();
		} else {
			$filter = new Filter();
			$filter->brand_car_name = Input::has('brand_car_name') ?
				Input::get('brand_car_name') : '-1';
			$filter->model_name = Input::has('model_name') ?
				Input::get('model_name') : '-1';
			$filter->year_issue = Input::has('year_issue') ?
				Input::get('year_issue') : '-1';
			$filter->mileage = Input::has('mileage') ?
				Input::get('mileage') : '-1';
			$filter->price = Input::has('price') ?
				Input::get('price') : '-1';
			$filter->active = (Input::get('active') ? '1' : '0');
			$filter->user_id = Session::get('id');
			$filter->save();

			return Redirect::to('/profile/filters/control')
				->with('message', 'Everything went great! You have added filter!');
		}
	}

	public function editFilters()
	{
		/*under working*/
		return view('user.profile', ['user' => User::findOrFail(Session::get('id'))]);
	}
}