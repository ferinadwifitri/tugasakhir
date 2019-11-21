<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\status_bayar;

class status_bayarcontroller extends Controller
{
    public function index(){
    	$status_bayar = status_bayar::all();
    	return view('admin.status_bayar.index',compact('status_bayar'));
    }
}
