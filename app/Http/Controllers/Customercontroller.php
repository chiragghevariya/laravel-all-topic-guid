<?php

namespace App\Http\Controllers;


use App\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;

class Customercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        return view('admin.customer.create');
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        if($request->ajax()){
//            $customer=Customer::create($request->all());
//            return response()->json($customer);
//        }
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
//    public function edit(Request $request )
//    {
//        if($request->ajax()){
//            $customer=Customer::find($request->id);
//            return response($customer);
//        }
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        if($request->ajax()){
//            $customer=Customer::find($request->id);
//            $customer->first_name =$request->first_name;
//            $customer->last_name =$request->last_name;
//            $customer->sex =$request->sex;
//            $customer->email =$request->email;
//            $customer->phone =$request->phone;
//            $customer->save();
//            return response($customer);
//        }
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
    public function newCustomer(Request $request){

        if($request->ajax()){
            $customer=Customer::create($request->all());
            return Response($customer);
        }
    }

    public function getUpdate(Request $request){
        if($request->ajax()){
            $customer=Customer::find($request->id);
            return Response($customer);
        }
    }

    public function newUpdate(Request $request){

        if($request->ajax()){
            $customer=Customer::find($request->id);
            $customer->first_name =$request->first_name;
            $customer->last_name =$request->last_name;
            $customer->sex =$request->sex;
            $customer->email =$request->email;
            $customer->phone =$request->phone;
            $customer->save(); 
            return response($customer);
        }

    }

    public function deleteCustomer(Request $request){

        if($request->ajax()){
            Customer::destroy($request->id);
            return Response()->json(['sms'=>'delete success']);
        }
    }

    public function index()
    {
//        $cust=Customer::orderBy('id','dsc')->paginate(3);
        $cust=Customer::all();
        return view('admin.customer.customer',compact('cust'));
    }

}
