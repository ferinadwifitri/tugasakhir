<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;
use QrCode;

class memberController extends Controller
{
    public function index(){
    	$member = member::all();
    	return view('admin.member.index',compact('member'));
    }

    public function Create(){
    	return view('admin.member.Create');
    }

    public function store(Request $r){
    	$member = new member();
    	$member->nama=$r->nama;
    	$member->alamat=$r->alamat;
    	$member->no_telp=$r->no_telp;
    	$member->saldo=$r->saldo;
    	$member->tgl_reg=$r->tgl_reg;
    	$member->email=$r->email;
    	$member->password=$r->password;
    	$member->save();



        QrCode::format('png')->size(200)->generate($member->id_member, '../public/qrcodes/'.$member->id_member.'.png');
    	return redirect('/member');
    }

    public function edit($id){
        $member = member::find($id);
        return view('admin.member.edit',compact('member'));
    }

    public function update(Request $r){
        $member = member::find($r->id_member);
        $member->nama=$r->nama;
        $member->alamat=$r->alamat;
        $member->no_telp=$r->no_telp;
        $member->saldo=$r->saldo;
        $member->tgl_reg=$r->tgl_reg;
        $member->email=$r->email;
        $member->password=$r->password;
        $member->save();
        return redirect ('/member');
    }

    public function hapus($id){
        $member = member::find($id);
        $member->delete();
        return redirect ('/member');
    }
}
