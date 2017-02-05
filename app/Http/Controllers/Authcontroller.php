<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
class Authcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
    public function storeregister(Request $request){

        $user =new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        $user->role="simpleUser";
        $user->save();

        return 'registration successfull';
    }

    public function authenticate(Request $request)
    {

        $email= $request->email;
        $password=$request->password;
        
//        $remember=$request->rememberme;


        if (Auth::attempt(['email' =>$email, 'password' =>$password])){

            // if(!empty($remember)){
            //     Auth::login(Auth::user()->id,true);
            // }
            if(Auth::user()->role == 'is_admin'){
                
                return redirect()->intended('admin');
            }

            if(Auth::user()->role == 'simpleUser'){

                return redirect()->intended('checkout');
            }
            
              // return "succ";
        }
        else
        {
            return redirect()->back();
        }

    }


    public function signout()
    {

        \Auth::logout();
        return redirect()->to('/');
    }
    
 
}
