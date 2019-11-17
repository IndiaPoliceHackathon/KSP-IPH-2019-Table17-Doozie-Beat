<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {
	use SoftDeletes;
	protected $table = 'users';
	protected $dates = ['deleted_at'];

	protected $fillable = [
		'first_name',
		'middle_name',
		'last_name',
		'email',
		'profile_image',
		'active_flag',
		'starting_from',
		'no_of_days',
		'username',
		'password',
		'remember_token',
		'last_seen',
	];
}
