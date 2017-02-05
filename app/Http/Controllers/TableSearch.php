<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TableSearch extends Controller
{
    public function index(){
        return view('fulltable.index');
    }
}
