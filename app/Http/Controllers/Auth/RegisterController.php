<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\companies;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
	
	/*
	|--------------------------------------------------------------------------
	    | Register Controller
	    |--------------------------------------------------------------------------
	    |
	    | This controller handles the registration of new users as well as their
	    | validation and creation. By default this controller uses a trait to
	    | provide this functionality without requiring any additional code.
	    |
	    */
	
	use RegistersUsers;
	
	
	/**
	* Where to redirect users after registration.
	     *
	     * @var string
	     */
	    protected $redirectTo = '/home';
	
	
	/**
	* Create a new controller instance.
	     *
	     * @return void
	     */
	    public function __construct()
	    {
		$this->middleware('guest');
	}
	
	
	/**
	* Get a validator for an incoming registration request.
	     *
	     * @param  array  $data
	     * @return \Illuminate\Contracts\Validation\Validator
	     */
	    protected function validator(array $data)
	    {
		
		if($data['type'] != "founder"){
            
			return Validator::make($data, [
			            'name' => 'required|string|max:255',
			            'email' => 'required|string|email|max:255|unique:users',
			            'password' => 'required|string|min:6|confirmed',
			            'type' => 'required|string'
			        ]);
		}
		else{
             session(['type'=> 'founder']);
			return Validator::make($data, [
			            'name' => 'required|string|max:255',
			            'email' => 'required|string|email|max:255|unique:users',
			            'password' => 'required|string|min:6|confirmed',
			            'type' => 'required|string',
                        'company_phone'=>'required|string|min:11',
                        'company_phone'=>'required|string|min:11',
                        'company_amount'=>'required|string',
                        'company_url'=>'required|string',
                        'company_about'=>'required|string',
                        'company_address'=>'required|string',
                        'company_mission'=>'required|string',

			        ]);
		}
		
	}
	
	
	/**
	* Create a new user instance after a valid registration.
	     *
	     * @param  array  $data
	     * @return \App\User
	     */
	    protected function create(array $data)
	    {
		
		if($data['type'] =="founder"){
            
			$this->handleFounder($data);
            session(['type'=> null]);
		}
		else{
			return User::create([
			            'name' => $data['name'],
			            'email' => $data['email'],
			            'password' => bcrypt($data['password']),
                        'type' => $data['type']
			        ]);
		}
		
	}
	
	protected function handleFounder($founder){

       $user =  User::create([
                    'name' => $founder['name'],
                    'email' => $founder['email'],
                    'password' => bcrypt($founder['password']),
                    'type' => $founder['type']
			    ]);

      $companies = new companies();
      $companies->name = $founder['company_name'];
      $companies->name = $founder['company_name'];
      
      
      return $user;
		
	}
}
