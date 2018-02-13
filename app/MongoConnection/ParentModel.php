<?php

namespace App;

use App\DBConnection;
use MongoDB;

class ParentModel {

	const COLLECTION = "";
    private $_mongo;
    protected $collection= "";
    private $user;

	public function __construct() 
    {
        $this->_mongo = DBConnection::instantiate();
        $this->collection = $this->_mongo->getCollection($this->collection);

    }

    private function _loadData($id)
    {
        // $id = new MongoDB\BSON\ObjectID($_SESSION['user_id']);
        $this->_user = $this->collection->findOne(array('_id' => $id));
    }

     public function all() 
    {
        $result = $this->collection->find();

        foreach ($result as $r) {
           print_r ($r);
         
        }
    }


    public function insert($values) 
    {
        $result = $this->collection->insertOne($values);

        return $result;
    }

    public function findOne($id) 
    {

        $result = $this->collection->findOne(array('_id' => new  MongoDB\BSON\ObjectID($id)));

       return $result;
    }

    public function updateOne($id, $values)
    {
        $result = $this->collection->updateOne(array('_id'=> new  MongoDB\BSON\ObjectID($id)),array('$set' => $values) );

        return $result;
    }

    public function deleteOne($id)
    {
        $result = $this->collection->deleteOne(array('_id' => new MongoDB\BSON\ObjectID($id)));
        return $result;
    }

}




