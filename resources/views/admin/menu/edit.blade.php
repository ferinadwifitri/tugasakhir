@extends('admin.index')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
        <small>index</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Menu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form"  method="POST" action="{{url('/menu/update')}}">
                {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama Menu</label>
                  <input type="text" class="form-control" name="nama" id="nama" value="{{$menu->nama}}">
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" name="harga" id="harga" value="{{$menu->harga}}">
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{$menu->deskripsi}}">
                </div>
                <div class="form-group">
                  <label for="stok">Stok</label>
                  <input type="text" class="form-control" name="stok" id="stok" value="{{$menu->stok}}">
                </div>
                <div class="form-group">
                  <label for="gambar">Input Gambar</label>
                  <input type="file" name="gambar" id="gambar">
                </div>
                <label for="id_kategori">Kategori</label>
                <select class="form-control" name="id_kategori">
                    @foreach($kategori as $k)
                      <option value="{{$k->id_kategori}}" {{$k->id_kategori == $menu->kategori_id ? 'selected' : ''}}>{{$k->nama_kategori}}</option>
                      
                    @endforeach
                </select>  
                <input type="hidden" name="id_menu" id="id_menu" value="{{$menu->id_menu}}">
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

@stop