<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $fillable = [

        'user_id',
        'format_id',
        'team_number_id',
        'size_id',
        'team_gender_id',
        'time',
        'note',
        'formatted_address',
        'lat',
        'lng'
	];

	public function user() {
        return $this->belongsTo('App\User');
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function format() {
        return $this->belongsTo('App\Format');
    }

    public function teamNumber() {
        return $this->belongsTo('App\TeamNumber');
    }

    public function teamGender() {
        return $this->belongsTo('App\TeamGender');
    }

    public function size(){
        return $this->belongsTo('App\Size');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function comments(){
        return $this->hasMany('App\Post');
    }

}
