<?php

namespace App\Masters;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerPaymentAccounts extends Model {
	use SoftDeletes;
	protected $table = 'customer_payment_accounts';
	protected $dates = ['deleted_at'];

	protected $fillable = [
		'customer_id', 'type', 'bank_name', 'branch_name', 'branch_email', 'ifsc_code', 'bank_address', 'account_name', 'account_type', 'account_number', 'wallet_name', 'wallet_reference', 'created_by', 'updated_by',
	];
}
