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


     public function all() 
    {
        $result = $this->collection->find();

        foreach ($result as $r) {
          
            print_r( $r);
         
        }
        
    }


    public function insertId($values) 
    {
        $result = $this->collection->insertOne($values);

        return $result->getInsertedId();
    }

// its working
    public function findOneId($id) 
    {

        $result = $this->collection->findOne(array('_id' => new  MongoDB\BSON\ObjectID($id)));

       return $result;
    }

     public function findOneApi($value) 
    {

        $result = $this->collection->findOne(array('api_key' => $value));

       return $result;
    }
//end its working 

    public function updateOneId($id, $values)
    {
        $result = $this->collection->updateOne(array('_id' => new  MongoDB\BSON\ObjectID($id)),array('$set' => $values) );

        return response()->json('Updated Successfully');
    }

    // its working

    public function deleteOneId($id)
    {
        $result = $this->collection->deleteOne(array('_id' => new MongoDB\BSON\ObjectID($id)));
        return $result->getDeletedCount();
    }
    //its working


    public function embedd($id, $values) 
    {
        $embedd = $this->collection->findOne(array('_id' => new MongoDB\BSON\ObjectID($id)));
        $values = $values;

        $embeddeddoc = $this->collection->updateOne(array('_id' => new MongoDB\BSON\ObjectID($id)), array('$push' => array('comments' => $values)));

        return true;

    }



}




