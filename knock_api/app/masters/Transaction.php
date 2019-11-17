<?php

namespace App\Masters;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model {
	use SoftDeletes;
	protected $table = 'transactions';
	protected $dates = ['created_at', 'updated_at', 'deleted_at','expires_at'];
	protected $with=['from_customer','to_customer'];
	protected $fillable = [
		'from', 'to', 'created_ts', 'paid','amount', 'circle',
	];

	public function from_customer()
	{
		return $this->belongsTo('App\Models\Customer', 'from', 'id');
	}

	public function to_customer()
	{
		return $this->belongsTo('App\Models\Customer', 'to', 'id');
	}
}
