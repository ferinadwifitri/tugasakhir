<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;

class kategoriController extends Controller
{
    public function index(){
    	$kategori = kategori::all();
    	return view('admin.kategori.index',compact('kategori'));
    }
    public function Create(){
    	return view('admin.kategori.Create');
    }

    public function store(Request $r){
    	$kategori = new kategori();
    	$kategori->nama_kategori=$r->nama_kategori;
    	$kategori->save();
    	return redirect('/kategori');
    }

    public function edit($id){
    	$kategori = kategori::find($id);
    	return view('admin.kategori.edit',compact('kategori'));
    }

    public function update(Request $r){
    	$kategori = kategori::find($r->id_kategori);
    	$kategori->nama_kategori=$r->nama_kategori;
    	$kategori->save();
    	return redirect ('/kategori');
    }

    public function hapus($id){
    	$kategori = kategori::find($id);
    	$kategori->delete();
    	return redirect ('/kategori');
    }
}
