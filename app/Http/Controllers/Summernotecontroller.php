<?php

namespace App\Http\Controllers;

use App\Summernote;

use DOMDocument;
use Illuminate\Http\Request;



use App\Http\Requests;
use Intervention\Image\Facades\Image;


class Summernotecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $summer =Summernote::all();
        return view('summernote.index',compact('summer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('summernote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $message=$request->input('mixdata');
       $summer=new Summernote();
       $dom = new DomDocument();
       $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
       $images = $dom->getElementsByTagName('img');
       // foreach <img> in the submited message
       foreach($images as $img){
           $src = $img->getAttribute('src');

           // if the img source is 'data-url'
           if(preg_match('/data:image/', $src)){
               // get the mimetype
               preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
               $mimetype = $groups['mime'];
               // Generating a random filename
               $filename = uniqid();
               $filepath = '/summernoteimages/'.$filename.'.'.$mimetype;

               // @see http://image.intervention.io/api/
               $image = Image::make($src)
                   // resize if required
                   /* ->resize(300, 200) */
                   ->encode($mimetype, 100)  // encode file to the specified mimetype
                   ->save(public_path($filepath));
               $new_src = asset($filepath);
               $img->removeAttribute('src');
               $img->setAttribute('src',$new_src);
           } // <!--endif
       } // <!-
       $summer->mixdata = $dom->saveHTML();
       $summer->save();

        // $summer= new Summernote();
        // $summer->mixdata =b64toUrl($request->mixdata);
        // $summer->save();
        return "god";
    }


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
}
