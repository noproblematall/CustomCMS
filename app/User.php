<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'username', 'email', 'password', 'role_id', 'parent_id','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function my_users(){
        return $this->hasMany('App\User', 'parent_id');
    }

    public function my_admin(){
        return $this->belongsTo('App\User', 'parent_id');
    }

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function tableisian(){
        return $this->belongsTo('App\Models\TableIsian');
    }
}
