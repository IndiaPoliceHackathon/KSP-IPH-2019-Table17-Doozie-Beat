<?php

namespace App\Masters;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyTransaction extends Model
{
    use SoftDeletes;
	protected $table = 'company_transactions';
	protected $dates = ['created_at', 'updated_at', 'deleted_at','expires_at'];
	protected $with=['from_customer'];
	protected $fillable = [
		'from',  'created_ts', 'paid', 'amount', 'circle','expires_at'
	];

	public function from_customer()
	{
		return $this->belongsTo('App\Models\Customer', 'from', 'id');
	}
}
