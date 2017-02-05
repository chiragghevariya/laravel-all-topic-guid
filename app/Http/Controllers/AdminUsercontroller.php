<?php

namespace App\Http\Controllers;

use App\Post;
use App\Role;
use Illuminate\Http\Request;
use summernote\Editor;

use App\Http\Requests;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class AdminUsercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::all();
        return view('admin.User.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::all();
        return view('admin.User.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->hobbies = $request->hobbies;
        $post->role = $request->role;
        $post->body = b64toUrl($request->body);
        if ($file = $request->file('photo')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $post->photo = $name;
            $post->save();
        }
        return "succesfull";
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =Post::findOrFail($id);;
        $roles = Role::all();
        return view('admin.User.edit',compact('post','roles'));
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

        $post = Post::find($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->hobbies = $request->hobbies;
        $post->role = $request->role;
        if ($file = $request->file('photo')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $post->photo = $name;
            $post->save();
        }
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewbody(){
    
        $post =Post::all();
        return view('admin.User.view',compact('post'));
    }
}
