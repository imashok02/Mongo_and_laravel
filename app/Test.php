<?php

namespace App;

use App\DBConnection;
use MongoDB;

// require_once 'DBConnection.php';
// require_once 'session.php';


class Test {

    const COLLECTION = 'Testers';
    private $_mongo;
    private $collection;
    private $user;


    public function __construct() 
    {
        $this->_mongo = DBConnection::instantiate();
        $this->collection = $this->_mongo->getCollection(Test::COLLECTION);

    }

    private function _loadData($id)
    {
        // $id = new MongoDB\BSON\ObjectID($_SESSION['user_id']);
        $this->_user = $this->collection->findOne(array('_id' => $id));
    }

    public function insert($values) 
    {
        $this->collection->insertOne($values);
    }


}