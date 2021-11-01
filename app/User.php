<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Photo;
use App\Post;
use App\Status;
use App\Gender;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'role_id',
        'status_id',
        'photo_id',
        'gender_id',
        'password',
        'lat',
        'lng',
        'formatted_address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function gender(){
        return $this->belongsTo('App\Gender');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }  

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function adminRole(){
        if($this->role->name == "Admin" && $this->status->name == "Active"){
            return true;
        }
        return false;
    }
}
