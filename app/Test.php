<?php

namespace App;


use App\ParentModel;


// require_once 'DBConnection.php';
// require_once 'session.php';


class Test extends ParentModel {

    const COLLECTION = 'Testers';
    private $_mongo;
    protected $collection = "Testers";
    private $user;




}