<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use App\kategori;

class menuController extends Controller
{
    public function index(){
    	$menu = menu::all();
    	return view('admin.menu.index',compact('menu'));
    }

    public function Create(){
    	$kategori = kategori::all();
    	return view('admin.menu.Create',compact('kategori'));
    }

    public function store(Request $r){
    	$menu = new menu();
    	$menu->nama=$r->nama;
    	$menu->harga=$r->harga;
    	$menu->deskripsi=$r->deskripsi;
    	$menu->stok=$r->stok;
    	//$menu->gambar=$r->gambar;
    	$menu->kategori_id=$r->id_kategori;
    	$menu->save();
    	return redirect('/menu');
    }

    public function edit($id){
        $menu = menu::find($id);
        $kategori = kategori::all();
        return view('admin.menu.edit',compact('menu'),compact('kategori'));

    }

    public function update(Request $r){
        $menu = menu::find($r->id_menu);
        $menu->nama = $r->nama;
        $menu->harga = $r->harga;
        $menu->deskripsi = $r->deskripsi;
        $menu->stok = $r->stok;
        //$menu->gambar = $r->gambar;
        $menu->kategori_id=$r->id_kategori;
        $menu->save();
        return redirect ('/menu');
    }

    public function hapus($id){
        $menu = menu::find($id);
        $menu->delete();
        return redirect ('/menu');
    }
}
