<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['brand_car_name', 'model_name', 'year_issue',
        'mileage', 'price', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static $rules = array(
        'brand_car_name'             => 'required',
        'model_name'             => 'required',
        'year_issue'             => 'required|numeric',
        'mileage'             => 'required|numeric',
        'price'             => 'required|numeric',
        'description'             => 'required'
    );
}
