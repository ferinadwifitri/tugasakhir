<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\detail_transaksi;

class transaksiController extends Controller
{
    public function transaksiberjalan(){
    	$transaksi = transaksi::where('status_bayar_id',1)->get();
    	return view('admin.transaksi.berjalan',compact('transaksi'));
    }
    public function transaksiselesai(){
    	$transaksi = transaksi::where('status_bayar_id',2)->get();
    	return view('admin.transaksi.selesai',compact('transaksi'));
    }

    public function ubahselesai($id){
    	$transaksi = transaksi::find($id);

        $data = Detail_transaksi::where('transaksi_id',$id_transaksi);
        $total = $data->sum('total_harga');

        $updatetransaksi = transaksi::where('id_transaksi',$id_member)->update(['saldo'=>($member->saldo-$total)]);

    	$transaksi->status_bayar_id = 2;
    	$transaksi->save();
    	return redirect('transaksiselesai');
    }

    public function daftarpesanan($id)
    {
        $transaksi = transaksi::find($id);
        $detail_transaksi = Detail_transaksi::all();

        $data = Detail_transaksi::where('transaksi_id',$transaksi->id_transaksi)->get();

        $total = 'Rp. '.number_format($data->sum('total_harga'),0,",",".");

        $list = $data->all();   

        return view('admin/transaksi/bayar', ['detail_transaksi'=>$detail_transaksi, 'data'=> $data, 'total'=>$total, 'list'=>$list]);
    }

    

}
