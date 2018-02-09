<?php

namespace App;

use App\DBConnection;

// require_once 'DBConnection.php';
// require_once 'session.php';


class User {

    const COLLECTION = 'Users';
    private $_mongo;
    private $collection;
    private $user;


    public function __construct() 
    {
        $this->_mongo = DBConnection::instantiate();
        $this->collection = $this->_mongo->getCollection(User::COLLECTION);

        if ($this->isLoggedIn())
            $this->_loadData();
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public function authenticate($username, $password)
    {
        $query = array(
            'username' => $username,
            'password' => md5($password)
        );
        $this->_user = $this->collection->findOne($query);

        if(empty($this->_user))
            return false;

        $_SESSION['user_id'] = (string) $this->_user['_id'];

        return True;
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
    }

    public function __get($attr)
    {
        if(empty($this->_user))
            return NULL;

        switch($attr)
        {
            case 'address':
            $address = $this->_user['address'];
            return sprintf('Town: %s, Planet: %s', $address['town'], $address['planet']);

            case 'town':
            return $this->_user['address']['town'];

            case 'planet':
            return $this->_user['address']['planet'];
            case 'password':
            return NULL;

            default:
            return (isset($this->_user['attr'])) ? $this->_user['attr'] : NULL;
        }
    }

    private function _loadData()
    {
        $id = new MongoDB\BSON\ObjectID($_SESSION['user_id']);
        $this->_user = $this->collection->findOne(array('_id' => $id));
    }


}