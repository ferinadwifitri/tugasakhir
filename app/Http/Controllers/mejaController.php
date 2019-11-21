<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\meja;

class mejaController extends Controller
{
    public function index(){
    	$meja = meja::all();
    	return view('admin.meja.index',compact('meja'));
    }
    public function Create(){
    	return view('admin.meja.Create');
    }

    public function store(Request $r){
    	$meja = new meja();
        $meja->no_meja = $r->no_meja;
    	$meja->password=$r->password;
    	$meja->save();
    	return redirect('/meja');
    }

    public function edit($id){
    	$meja = meja::find($id);
    	return view('admin.meja.edit',compact('meja'));
    }

    public function update(Request $r){
    	$meja = meja::find($r->no_meja);
    	$meja->password=$r->password;
    	$meja->save();
    	return redirect ('/meja');
    }

    public function hapus($id){
    	$meja = meja::find($id);
    	$meja->delete();
    	return redirect ('/meja');
    }
}
