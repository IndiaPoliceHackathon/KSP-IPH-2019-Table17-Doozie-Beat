<?php

namespace App\Masters;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model {
	use SoftDeletes;
	protected $table = 'plans';
	protected $dates = ['deleted_at'];

	protected $fillable = [
		'circle_no', 'no_of_people', 'amount', 'upgrade_amount', 'company_changes', 'company_changes_description',
	];
}
