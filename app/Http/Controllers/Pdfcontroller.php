<?php

namespace App\Http\Controllers;

use App\Post;

use Barryvdh\DomPDF\PDF;

use Illuminate\Http\Request;

use App\Http\Requests;

class Pdfcontroller extends Controller
{
//    public function pdf(Request $request){
//
//        $posts =Post::all();
//
//        if($request->has('download')){
//            $pdf = PDF::loadView('admin.User.pdf',['posts'=>$posts]);
//            return $pdf->download('ram.pdf');
//        }
//        return view('admin.User.index',compact('posts'));
//    }

}
