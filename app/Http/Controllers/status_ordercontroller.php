<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\status_order;

class status_ordercontroller extends Controller
{
    public function index(){
    	$status_order = status_order::all();
    	return view('admin.status_order.index',compact('status_order'));
    }
}
