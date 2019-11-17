<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\masters\Company;
use App\Models\masters\FinancialYear;

use DB;
use Response;
use Redirect;
use Auth;
use Input;
use Session;
use Socialite;
use Carbon\Carbon;
use DateTime;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use RegistersUsers, ThrottlesLogins;
    private $redirectTo = '/';

    
    public function __construct()
    {
        // $this->middleware('guest', ['except' => 'logout']);
    }

   protected function validator(array $data)
   {
       return Validator::make($data, [
           'username' => 'required|max:255',
         //  'email' => 'required|email|max:255|unique:users',
           'password' => 'required|confirmed|min:6',
       ]);
   }


    protected function showRegister()
    {
        return view('auth.register');
    }

    protected function postSignUp(SignUpRequest $request)
    {
        // dd($request->all());
        if($request->password==$request->confirm_password){

     Sentinel::create([
    'first_name'    => $request->first_name,
    'last_name' => $request->last_name,
    'phone_number' => $request->phone_number,
    'address_1' => $request->address_1,
    'address_2' => $request->address_2,
    'city' => $request->city,
    'state' => $request->state,
    'country' => $request->country,
    'zip_code' => $request->zip_code,
    'email' => $request->email,
    'password' => $request->password,
     ]);
    


        $sign_up = new SignUp;
        $sign_up->first_name=$request->first_name;
        $sign_up->last_name=$request->last_name;
        $sign_up->email=$request->email;
        $sign_up->password=bcrypt($request->password);
        $sign_up->phone_number=$request->phone_number;
        $sign_up->address_1=$request->address_1;
        $sign_up->address_2=$request->address_2;
        $sign_up->city=$request->city;
        $sign_up->state=$request->state;
        $sign_up->country=$request->country;
        $sign_up->zip_code=$request->zip_code;
        $sign_up->save();
       
       $userdata = array(
            'email'     => $request->email,
            'password'  => $request->password
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {
          return Redirect::route('home')->with('message','Hello '.Auth::user()->first_name .',Successfully  Registered ')->with('er_type','success');
        } else {        
          return Redirect::to('sign_in')->with('message','Credentials Wrong')->with('er_type','danger');
        }
    }else{
   return Redirect::to('sign_up')->with('message','Password Mismatch')->with('er_type','danger');
    }
    }

    protected function showLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
      //  dd(bcrypt($request->password));
  // validate the info, create rules for the inputs
    $rules = array(
        'username'    => 'required', // make sure the email is an actual email
        'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        
    );

    // run the validation rules on the inputs from the form
    $validator = Validator::make(Input::all(), $rules);

    // if the validator fails, redirect back to the form
    if ($validator->fails()) {
       // dd(56);
        return Redirect::to('login')->with('message','Inputs Invalid')->with('er_type','error')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
    } else {

        // create our user data for the authentication
        $userdata = array(
            'username'     => Input::get('username'),
            'password'  => Input::get('password'),
            'deleted_at' => null
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {
          Session::put('active_menu', 'subscription');

        

          return Redirect::route('home')->with('message','Hello '.Auth::user()->first_name .',Successfully Logged In')->with('er_type','success');
        } else {        
          return Redirect::to('login')->with('message','Credentials Wrong')->with('er_type','error');
        }

    }
    }

    public function signOut()
    {
      Auth::logout();
      Session::flush();
      return Redirect::route('login');
    }

    public function changePassword()
    {
      return view('auth.password');
    }

    public function updatePassword(Request $request)
    {
        //d($request->all());
     $user_id=Auth::user()->id;
     $new_password=$request->new_password;
     $confirm_password=$request->confirm_password;
   
     if($new_password==$confirm_password){
       DB::table('users')
            ->where('id', $user_id)
            ->update(['password' => bcrypt($new_password)]);
       Auth::logout();     
        return Redirect::route('login')->with('message','Your Password is changed Successfully')->with('er_type','success');
     }
     else{
        return Redirect::back()->with('message','Something went wrong')->with('er_type','error');
     }
    
    }

    //Social Login
    public function redirectToProvider($provider)
    {
      return Socialite::driver($provider)->redirect();
    }
    


   public function handleProviderCallback($provider)
    {
     //notice we are not doing any validation, you should do it
        $fetchUser = Socialite::driver($provider)->stateless()->user();

        
        echo json_encode($fetchUser);
        // dd($fetchUser);
        if(isset($fetchUser->email)){
          $user=User::where('email',$fetchUser->email)->first();
          if($user){
 
            $user->last_seen=Carbon::now();
            $user->save();

            Auth::loginUsingId($user->id);
            return Redirect::route('subscription')->with('message','Hello '.Auth::user()->first_name .',Successfully Logged In')->with('er_type','success');
          }else{
            if(isset($fetchUser->email)){
              return Redirect::to('login')->with('message',"Account with ".$fetchUser->email." dosen't exist")->with('er_type','error');
            }else{
              return Redirect::to('login')->with('message',"Account not registered")->with('er_type','error');
            }
          }
        }
         
    }


     public function setFinancialYear()
    {
      $financial_year=FinancialYear::select('id','from_date','to_date','display_year_format')->withTrashed()->get();

      $users= DB::table('users')->where('id', Auth::user()->id)->select('active_financial_year_id')->first();


      return view('auth.financial_year')->with('financial_year',$financial_year)->with('users',$users);
    }

    public function updateFinancialYear(Request $request){
      // dd($request->all());
      DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['active_financial_year_id' => $request->active_financial_year_id]);


      return Redirect::route('dashboard')->with('message','Active Financial Year Updated Successfully')->with('er_type','success');      
    }
}

