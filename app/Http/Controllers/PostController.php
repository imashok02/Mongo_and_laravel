<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Post;
use App\User;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posting = new Post;

        $post = $Posting->all();
        
       return $post;
        
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
        $user = new User;
        $post = new Post();

         $upload_url1 = 'http://s3.amazonaws.com/';

         $upload_folder = '/data/media/';

         $image = $request->file('file');

         $imageFileName = time() . '.' . $image->getClientOriginalExtension();

         $s3 = \Storage::disk('s3');

         $filePath = '/data/media/' . $imageFileName;

         $va = $s3->put($filePath, file_get_contents($image), 'public');

         $media = $upload_url1.config('filesystems.disks.s3.bucket').$upload_folder.$imageFileName;

         

        $values = [

            'post' => $request->post,
            'user_id' => $user->auth_user()->_id,
            'media' => $media
        ];

        $result = $post->insertId($values);

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
        $post = new Post;
        $ok = $post->findOneId($id);
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
        $post = new Post();

        $upload_url1 = 'http://s3.amazonaws.com/';

         $upload_folder = '/data/media/';

         $image = $request->file('file');

         $imageFileName = time() . '.' . $image->getClientOriginalExtension();

         $s3 = \Storage::disk('s3');

         $filePath = '/data/media/' . $imageFileName;

         $va = $s3->put($filePath, file_get_contents($image), 'public');

         $media = $upload_url1.config('filesystems.disks.s3.bucket').$upload_folder.$imageFileName;

        $values = [
            
            'post' => $request->post,
            'user_id' => $user->auth_user()->_id,
            'media' => $media
        ];

        $result = $post->updateOneId($id,$values);

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
        $post = new Post;
        $ok = $post->deleteOneId($id);
        return($ok);
        
    }

    public function my_posts()
    {
        $postInstance = new Post;

        $userInstance = new User;

        $user_id = $userInstance->auth_user()->_id;

        $posts = $postInstance->findforUser($user_id);

        foreach ($posts as $post) {
            print_r($post);
        }
    }

}
