<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
	protected $fillable = ['user_id', 'post_id'];

	public function user(){
		return $this->belongsTo('App\User');
	}
}

