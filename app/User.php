<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = array(
        'name'             => 'required',
        'email'            => 'required|email',
        'password'         => 'required',
        'password_confirm' => 'required|same:password'
    );

    public function ads()
    {
        return $this->hasMany('App\Ad');
    }

    public function filters()
    {
        return $this->hasMany('App\Filter');
    }
}
