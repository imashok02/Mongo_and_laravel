<?php

namespace App;

use App\ParentModel;
use Hash;
use MongoDB;

// require_once 'DBConnection.php';
// require_once 'session.php';


class User extends ParentModel {

    const COLLECTION = 'users';
    private $_mongo;
    protected $collection = "users";
    private $user;


    public function authenticate($email, $password)
	{

		$query = array(
			'email' => $email,
			'password' => $password
		);


		$user = $this->collection->findOne($query);

		
		if(empty($user))
			return false;
		// $_SESSION['user_id'] = (string) $this->_user['_id'];
		else
		return True;
	}


    


}