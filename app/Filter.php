<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = ['brand_car_name', 'model_name', 'year_issue',
        'mileage', 'price', 'active', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static $rules = array(
        'year_issue'             => 'numeric',
        'mileage'             => 'numeric',
        'price'             => 'numeric'
    );
}
