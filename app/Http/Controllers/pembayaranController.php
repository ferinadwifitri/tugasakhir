<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pembayaran;

class pembayaranController extends Controller
{
    public function index(){
    	$pembayaran = pembayaran::all();
    	return view('admin.pembayaran.index',compact('pembayaran'));
    }
}
