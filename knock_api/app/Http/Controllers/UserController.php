<?php namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
// use JWTAuth;
use Response;
use App\Repository\Transformers\UserTransformer;
use \Illuminate\Http\Response as Res;
use Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;



class UserController extends ApiController
{   
    /**
     * @var \App\Repository\Transformers\UserTransformer
     * */
    protected $userTransformer;
    public function __construct(userTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
    }
    /**
     * @description: Api user authenticate method
     * @author: Adelekan David Aderemi
     * @param: email, password
     * @return: Json String response
     */
    public function authenticate(Request $request)
    {
        // dd($request->all());
        $rules = array (
            'username' => 'required',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        }
        else{
            $user = User::where('username', $request->username)->first();
            // dd($user);
            if($user){
                $api_token = $user->api_token;
                if ($api_token == NULL){
                    return $this->_login($request['username'], $request['password']);
                }
                try{
                    $user = JWTAuth::toUser($api_token);
                    return $this->respond([
                        'status' => 'success',
                        'status_code' => $this->getStatusCode(),
                        'message' => 'Already logged in',
                        'user' => $this->userTransformer->transform($user)
                    ]);
                }catch(JWTException $e){
                    $user->api_token = NULL;
                    $user->save();
                    return $this->respondInternalError("Login Unsuccessful. An error occurred while performing an action!");
                }
            }
            else{
                return $this->respondWithError("Invalid Email or Password");
            }
        }
    }
    private function _login($username, $password)
    {
        $credentials = ['username' => $username, 'password' => $password];
        if ( ! $token = JWTAuth::attempt($credentials)) {
            return $this->respondWithError("User does not exist!");
        }
        $user = JWTAuth::toUser($token);
        $user->api_token = $token;
        $user->save();
        return $this->respond([
            'status' => 'success',
            'status_code' => $this->getStatusCode(),
            'message' => 'Login successful!',
            'data' => $this->userTransformer->transform($user)
        ]);
    }
    /**
     * @description: Api user register method
     * @author: Adelekan David Aderemi
     * @param: lastname, firstname, username, email, password
     * @return: Json String response
     */
    // public function register(Request $request)
    // {
    //     $rules = array (
    //         'customer_no' => 'required',
	// 		'full_name' => 'required',
		
	// 		'mobile_no'=>'required'
    //         // 'username' => 'required|max:255',
    //         // 'email' => 'required|email|max:255|unique:users',
    //         // 'password' => 'required|min:6|confirmed',
    //         // 'password_confirmation' => 'required|min:3'
    //     );
    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator-> fails()){
    //         return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
    //     }
    //     else{
    //         $pass = env('USER_PASSWORD', 'HAPPY');
	// 		$pass=generate_string(6);
    //         $username = '';
	// 		$flag = 1;
	// 		while ($flag) {
	// 			$rand_no = rand(10000, 99999);
	// 			$prefix = env('PRE_FIX');
	// 			$u_name = $prefix . $rand_no;
	// 			$found = DB::table('users')->where('username', $u_name)->first();
	// 			if (!$found) {
	// 				$flag = 0;
	// 				$username = $u_name;
	// 			}
	// 		}
    //         $user = User::create([
    //             'username' => $username,
    //             'email' => $request['email'],
    //             'first_name' => $request['first_name'],
    //             'role_id' => 2,
    //             'password' => \Hash::make($request['password']),
    //         ]);

    //         $request['sponsor'] = $request->sponsor_id;
	// 		$request['user_id'] = $user->id;
	// 		$request['customer_no'] = $username;
	// 		$request['name'] = $request->full_name;
	// 		$request['email'] = $request->email;
	// 		$request['gender'] = $request->gender;
	// 		$request['circle'] = 0;
	// 		$request['expires_at'] = Carbon::now()->addHour(24); 

    //         Customer::create($request->all());
            
    //         $customer = Customer::where('user_id', $user->id)->first();
	// 		$sponsor = Customer::where('id', $request->sponsor_id)->first();
	// 		sendSMS($customer,$pass);
	// 		$user->customer_id=$customer->id;
	// 		$user->save();
	// 		$transaction_paid = 0;
	// 		$transaction = new Transaction;
	// 		$transaction->from = $customer->id;
	// 		$transaction->to = $request->from_id;
	// 		$transaction->amount = 200;
	// 		$transaction->created_ts = Carbon::now();
	// 		$transaction->expires_at = Carbon::now()->addHour(24);
	// 		$transaction->created_by = $user->id;
	// 		if ($request->epin_valid == 1) {
	// 			$epin = EPIN::where('code', $request->epin_no)->first();
	// 			if ($epin->paid_flag == 1) {
	// 				$transaction_paid = 1;
	// 			} else {
	// 				$transaction_paid = 0;
	// 			}
	// 			$epin->shared_with = $user->id;
	// 			$epin->used_by = $user->id;
	// 			$epin->save();
	// 			if($sponsor->circle<=1){
	// 				$sponsor->threshold+=1;
	// 			}
	// 		} else {
	// 			$transaction->paid = 0;
	// 			if($sponsor->circle<=1){
	// 				$sponsor->pending+=1;
	// 			}
	// 		}
	// 		$transaction->circle = 1;
	// 		$transaction->save();

	// 		if($request->cash_paid==1){
	// 			processTransaction($transaction->id);
	// 		}

	// 		$sponsor->save();

	// 		$company_transaction = new CompanyTransaction;
	// 		$company_transaction->from = $transaction->from;
	// 		$company_transaction->amount = 99;
	// 		$company_transaction->created_ts = Carbon::now();
	// 		$company_transaction->paid=$transaction_paid;
	// 		$company_transaction->circle = 1;
	// 		$company_transaction->expires_at = Carbon::now()->addHour(24); 
	// 		$company_transaction->save();

	// 		$upgrade = new Upgrade;
	// 		$upgrade->customer_id = $customer->id;
	// 		$upgrade->joining_ts = Carbon::now();
	// 		$upgrade->circle = 0;
	// 		$upgrade->created_by = $user->id;
	// 		$upgrade->save();

    //         return $this->_login($request['username'], $request['password']);
    //     }
    // }
    /**
     * @description: Api user logout method
     * @author: Adelekan David Aderemi
     * @param: null
     * @return: Json String response
     */
    public function logout($api_token)
    {
        try{
            $user = JWTAuth::toUser($api_token);
            $user->api_token = NULL;
            $user->save();
            JWTAuth::setToken($api_token)->invalidate();
            $this->setStatusCode(Res::HTTP_OK);
            return $this->respond([
                'status' => 'success',
                'status_code' => $this->getStatusCode(),
                'message' => 'Logout successful!',
            ]);
        }catch(JWTException $e){
            return $this->respondInternalError("An error occurred while performing an action!");
        }
    }
}
