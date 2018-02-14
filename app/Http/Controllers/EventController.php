<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Event;
use App\User;
use App\Location;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $eventing = new Event;

        $event = $eventing->all();
        
       return $event;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locate = new Location;

        return $locate->all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = new User;
        $event = new Event();

        $values = [

            'name' => $request->name,
            'location_id' => $request->location_id,
            'user_id' => $user->auth_user()->_id
        ];

        $result = $event->insertId($values);



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
        $event = new Event;

        $ok = $event->findOneId($id);

        return $ok;
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
        $event = new Event();

        $values = [

             'name' => $request->name,
             'event_category_id' => $request->event_category_id
        ];

        $result = $event->updateOneId($id,$values);

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
        $event = new Event;
        $ok = $event->deleteOneId($id);
        return($ok);
        
    }

}
