<?php

namespace App\Http\Controllers;
use App\transaksi;
use App\member;
use App\Detail_transaksi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class qrcodeController extends Controller
{
    public function index($id){
        $id = $id;
        $transaksi = transaksi::where('id_transaksi',$id)->first();
        return view('/admin/qr/index', ['id'=>$id,'transaksi'=>$transaksi]);

    }

    public function indextopup(){
        return view ('/admin/qr/indextopup');
    }

    
    public function selesai($id_member,$id_transaksi){
    	$member = Member::where('id_member',$id_member)->first();
        $transaksi = Transaksi::where('id_transaksi',$id_transaksi)->first();

        $data = Detail_transaksi::where('transaksi_id',$id_transaksi);

        
        $total = $data->sum('total_harga');

        if($member->saldo>=$total)
            {
                
                $transaksi->status_bayar_id=2;
                $transaksi->save();
                $updatedeposit = Member::where('id_member',$id_member)->update(['saldo'=>($member->saldo-$total)]);
                Session::flash("flash_notification",[
                    "level"=>"success",
                    "message"=>"Pembayaran Berhasil"
                    ]);

            }
            else
            {
                Session::flash("flash_notification",[
                    "level"=>"danger",
                    "message"=>"Transaksi Gagal! Deposit Member Tidak Mencukupi"
                    ]);
                
            }
    
    	return redirect('/transaksiselesai');
    }

//     public function pembayaran($id,$idt)
//     {
//         $member = member::where('id_member',$id)->first();
//         $transaksi = transaksi::where('id_transaksi',$idt)->first();
        
//             if($member->saldo>=($transaksi->total_harga))
//             {
//                 // $updatepembayaran = transaksi::where('id_transaksi',$idt)->update(['pembayaran'=>($transaksi->total_harga)]);
//                 $updatedeposit = member::where('id_member',$id)->update(['saldo'=>($member->saldo-$transaksi->total_harga)]);
//                 $transaksi->status_bayar_id = 2;
//                 $transaksi->save();
//                 Session::flash("flash_notification",[
//                     "level"=>"success",
//                     "message"=>"Pembayaran Berhasil"
//                     ]);
//             }else{
//                 Session::flash("flash_notification",[
//                     "level"=>"danger",
//                     "message"=>"Transaksi Gagal! Deposit Member Tidak Mencukupi"
//                     ]);
//             }
            
//             return redirect('/transaksiselesai');
        
    
// }
}
