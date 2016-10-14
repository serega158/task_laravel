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
			$join->where(function($query) {
				$query->on('ads.brand_car_name', '=', 'filters.brand_car_name')
					->orWhere('filters.brand_car_name', '=', '-1');
			});
			$join->where(function($query) {
				$query->on('ads.model_name', '=', 'filters.model_name')
					->orWhere('filters.model_name', '=', '-1');
			});
			$join->where(function($query) {
				$query->on('ads.year_issue', '=', 'filters.year_issue')
					->orWhere('filters.year_issue', '=', '-1');
			});
			$join->where(function($query) {
				$query->on('ads.mileage', '=', 'filters.mileage')
					->orWhere('filters.mileage', '=', '-1');
			});
			$join->where(function($query) {
				$query->on('ads.price', '=', 'filters.price')
					->orWhere('filters.price', '=', '-1');
			});
		})->where('filters.active', '=', '1')
			->where('filters.user_id', '=', $value = Session::get('id'))
			->distinct()->get();
		return view('ads', ['ads' => $ads]);
	}
}