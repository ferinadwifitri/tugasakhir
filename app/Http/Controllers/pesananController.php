<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\detail_transaksi;

class pesananController extends Controller
{
    public function pesananbaru(){
    	$pesanan = detail_transaksi::where('status_order_id',1)->get();
    	return view('admin.pesanan.baru',compact('pesanan'));
    }
    public function pesananberjalan(){
    	$pesanan = detail_transaksi::where('status_order_id',2)->get();
    	return view('admin.pesanan.berjalan',compact('pesanan'));
    }
    public function pesananselesai(){
    	$pesanan = detail_transaksi::where('status_order_id',3)->get();
    	return view('admin.pesanan.selesai',compact('pesanan'));
    }

    public function ubahberjalan($id){
    	$pesanan = detail_transaksi::find($id);
    	$pesanan->status_order_id = 2;
    	$pesanan->save();
    	return redirect('pesananberjalan');
    }

    public function ubahselesai($id){
    	$pesanan = detail_transaksi::find($id);
    	$pesanan->status_order_id = 3;
    	$pesanan->save();
    	return redirect('pesananselesai');
    }
}
