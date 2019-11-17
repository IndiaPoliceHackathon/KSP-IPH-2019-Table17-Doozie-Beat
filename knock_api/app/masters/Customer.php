<?php

namespace App\Masters;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model {
	use SoftDeletes;
	protected $table = 'customers';
	protected $dates = ['deleted_at','expires_at'];
	protected $with=['plan'];
	protected $fillable = [
		'name', 'circle', 'threshold', 'pending', 'sponsor', 'user_id', 'customer_no', 'email', 'mobile_no', 'gender', 'epin_no', 'address', 'country_id', 'state_id', 'pan_no', 'created_by', 'updated_by','expires_at'
	];

	public function plan()
	{
		return $this->belongsTo('App\Models\Plan', 'circle', 'circle_no');
	}

	public function sponsoredBy()
	{
		return $this->belongsTo('App\Models\Customer', 'sponsor', 'id');
	}
}
