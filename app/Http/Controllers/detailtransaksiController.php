<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\detail_transaksi;

class detailtransaksiController extends Controller
{
    public function index(){
    	$detail_transaksi = detail_transaksi::all();
    	return view('admin.detail_transaksi.index',compact('detail_transaksi'));
    }
}
