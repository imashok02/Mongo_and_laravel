<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use MongoDB;
use App\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInstance = new User;

        $user = $userInstance->all();
        
       return $user;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|min:3',
            'email' => 'required',
            'password' => 'required|min:6'
        ]);


        $user = new User();

        $values = [

            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password)
        ];

        $result = $user->insertId($values);

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userInstance = new User;
        $user = $userInstance->findOneId($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userInstance = new User();

        $values = [

            'name' => $request->name,
            'email' => $request->email
        ];

        $result = $userInstance->updateOneId($id,$values);

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userInstance = new User;
        $ok = $userInstance->deleteOneId($id);
        return($ok);
        
    }


    public function attach(Request $request, $id)
    {
        $userInstance = new User;

        $values = array(

            
            'comment' => $request->comment,
            'posted_at' => date('Y-m-d h:i:s')
        );

        $ok = $userInstance->embedd($id,$values);
    }
    
//refrence things

    public function relate($id)
    {
        $r = new User();
        $ok  = $r->findOneId($id);
        $result = new Profile();

        $final = $result->findOneId($ok->profile_id);

       
         $k = iterator_to_array($final);


         return ($k);
        
    }

}
