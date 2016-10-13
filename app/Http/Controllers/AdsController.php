<?php

namespace App\Http\Controllers;

use App\Ad;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdsController extends Controller
{
	public function index()
	{
		return view('ads', ['ads' => Ad::all()]);
	}

	public function indexFiltered()
	{
		if(!Session::get('id')) return $this->index();

		$ads = Ad::select('ads.*')->join('filters', function($join) {
			$join->on('ads.brand_car_name', '=', 'filters.brand_car_name');
			$join->on('ads.model_name', '=', 'filters.model_name');
			$join->on('ads.year_issue', '=', 'filters.year_issue');
			$join->on('ads.mileage', '<=', 'filters.mileage');
			$join->on('ads.price', '<=', 'filters.price');
		})->where('filters.active', '=', '1')
			->where('filters.user_id', '=', $value = Session::get('id'))
			->groupBy('ads.id')->get();
		return view('ads', ['ads' => $ads]);
	}
}