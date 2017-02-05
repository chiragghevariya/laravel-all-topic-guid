<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});


//        Authentication

Route::get('register',['as'=>'register',function(){

    return view('auth.signup');
}]);

Route::get('login',['as'=>'login',function(){

    return view('auth.signin');
}]);

Route::post('register',['as'=>'registered','uses'=>'Authcontroller@storeregister']);

Route::post('login',['as'=>'logined','uses'=>'Authcontroller@authenticate']);

Route::get('/logout',['as'=>'logout','uses'=>'Authcontroller@signout']);




                //admin user controller

Route::resource('admin','AdminUsercontroller');


Route::resource('multiple','Multiplecontroller');

//             pdf convert

Route::get('pdf',['as'=>'pdf',function (){
    $posts =App\Post::all();

    $pdf = PDF::loadView('admin.User.pdf',['posts'=>$posts]);
    return $pdf->download('first.pdf');

    return view('admin.User.index');

}]);


Route::get('checkout', ['middleware' =>['simpleuser','auth'] ,'as'=>'hello',function (Request $request) {

    if(Auth::check())
        return "you are simple user";
    else
        return redirect()->back();
}]);


Route::resource('/summernote','Summernotecontroller');



// customer route all

//Route::resource('customer','Customercontroller');





//customercontroller2



Route::get('/','Customercontroller@index');
Route::post('/newCustomer','Customercontroller@newCustomer');
Route::get('/getUpdate','Customercontroller@getUpdate');
Route::put('/newCustomer','Customercontroller@newUpdate');
Route::post('/deleteCustomer','Customercontroller@deleteCustomer');


// table full feature

Route::get('/table','TableSearch@index');





Route::get('admin',['middleware' => 'admin',function (Request $request){
   
    if(Auth::check())
    
    return "you are admin";
        
    else
        return redirect()->back();
    
}]);






