<?php

namespace App\Masters;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Threshold extends Model
{
    use SoftDeletes;
	protected $table = 'thresholds';
	protected $dates = ['deleted_at'];

	protected $fillable = [
		'circle','threshold'
	];
}
