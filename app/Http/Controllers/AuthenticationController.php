<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;

class AuthenticationController extends Controller
{

    public function login(Request $request) 

    {
        $user = new User();
        $email = $request->email;
        $password = $request->password;
        $log = $user->authenticating($email, $password);
        return $log;
    }


    public function logout(Request $request) 
    {

      $user = new User();

      $out = $user->logout($request->api_key);
       return $out;
  	}

  	// public function test(Request $request) 
   //  {

   //    $user = new User();

   //    $out = $user->auth_user();
   //    return $out;
  	//  }


}
