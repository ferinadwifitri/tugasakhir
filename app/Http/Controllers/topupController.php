<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\topup;
use App\member;
use App\transaksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class topupController extends Controller
{
    public function index(){
    	$topup = topup::all();
    	return view('admin.topup.index',compact('topup'));
    }

    public function tambahsaldo($id){
        $date = Carbon::today();
        $date = date('Y-m-d');
        $topup = topup::all();
        $member = Member::where('id_member',$id)->first();
        return view('admin/topup/tambah',['date'=>$date,'topup'=>$topup,'member'=>$member]);

    }

    public function proses(Request $request){
        $topup = new topup;
        $topup->nominal = $request->nominal;
        $topup->tanggal = $request->tanggal;
        $topup->member_id = $requestt->member_id;
        $member = member::where('id_member',$request->member_id)->first();
        $tambah = $member['saldo'] + $topup->nominal;
        $member = member::where('id_member',$request->member_id)->update(['saldo'=>$tambah]);
        $topup->save();
            Session::flash("flash_notification",[
                "level"=>"success",
                "message"=>"Berhasil Top Up Deposit"
                ]);  
         return redirect('topup');
    }

    public function store(Request $r){
        $member = member::find($r->id_member);
        $topup = new topup();
        $topup->nominal=$r->nominal;
        $topup->tanggal=$r->tanggal;
        $topup->member_id=$r->id_member;
        $topup->save();

        
        $member->saldo = $member->saldo + $topup->nominal;
        $member->save();

        return redirect('topup');
    }
}
