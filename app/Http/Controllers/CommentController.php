<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Post;
use App\User;
use App\Comment;
use MongoDB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $commenting = new Comment;

        $Comment = $commenting->all();
        
       return $Comment;
        
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
    public function store(Request $request, $post)
    {
        $user = new User;
        $comment = new Comment;

        $values = [

            'comment' => $request->comment,
            'post_id' => new  MongoDB\BSON\ObjectID($post),
            'user_id' => $user->auth_user()->_id
        ];

        $result = $comment->insertId($values);

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $post)
    {
        $comment = new Comment;
        $ok = $comment->findOneId($id);
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
    public function update(Request $request, $post, $id )
    {

    
        $user = new User;
        $comment = new Comment();

        $find_post = $comment->findOnePost(new  MongoDB\BSON\ObjectID($post));

        $values = [
            
            'comment' => $request->comment,
            'user_id' => $user->auth_user()->_id
        ];

        $result = $comment->updateOneId($id,$values);

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
        $comment = new Comment;
        $ok = $comment->deleteOneId($id);
        return($ok);
        
    }

}
