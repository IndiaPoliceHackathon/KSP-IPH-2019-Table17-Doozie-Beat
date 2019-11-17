<?php

namespace App\Masters;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upgrade extends Model {
	use SoftDeletes;
	protected $table = 'upgrades';
	protected $dates = ['deleted_at'];

	protected $fillable = [
		'upgrade_id', 'joining_ts', 'circle',
	];
}
