<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Models\CompanyTransaction;
use App\Models\Transaction;
use App\Models\CustomerPaymentAccounts;

class DashboardController extends Controller
{
    public function index($api_token) {

         
		
		return response()->json();
    }
    
}
