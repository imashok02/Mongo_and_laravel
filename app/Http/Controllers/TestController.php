<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use Hash;
use App\User;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testing = new User;

        $test = $testing->all();
        print_r( $test );
        
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
        $test = new User();

        $values = [

            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password)
        ];

        $result = $test->insert($values);

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
        $test = new User;
        $ok = $test->findOne($id);
        return($ok);
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
        $test = new User();

        $values = [

            'name' => $request->name,
            'email' =>$request->email,
            'password' => Hash::make($request->password)
        ];

        $result = $test->updateOne($id,$values);

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
        $test = new User;
        $ok = $test->deleteOne($id);
        return($ok);
        
    }
}
