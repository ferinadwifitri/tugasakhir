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
              <form role="form"  method="POST" action="{{url('/menu/simpan')}}">
                {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama Menu</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Input Nama Menu">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" name="harga" id="harga" placeholder="Input Harga">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Input Deskripsi">
                  <label for="stok">Stok</label>
                  <input type="text" class="form-control" name="stok" id="stok" placeholder="Input Stok">
                  <label for="gambar">Input Gambar</label>
                  <input type="file" name="gambar" id="gambar">
                <label for="id_kategori">Kategori</label>
                <select class="form-control" name="id_kategori">
                    @foreach($kategori as $k)
                      <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                    @endforeach
                </select>  
                </div>
              </div>
               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          
              </div>
              <!-- /.box-body -->

             
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