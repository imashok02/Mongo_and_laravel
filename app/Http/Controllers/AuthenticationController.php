<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;

class AuthenticationController extends Controller
{

    public function login() 

    {
        $user = new User();
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($user->authenticate($email, $password) == true)
        {
           return "success";
        }
        else
        {
            return "failure";
        }
    }

}
