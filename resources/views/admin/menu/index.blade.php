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
              <h3 class="box-title">Kelola Menu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Stok</th>
                  <th>Gambar</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($menu as $m)
                  <tr>
                    <td>{{$m->id_menu}}</td>
                    <td>{{$m->nama}}</td>
                    <td>{{$m->harga}}</td>
                    <td>{{$m->deskripsi}}</td>
                    <td>{{$m->stok}}</td>
                    <td>{{$m->gambar}}</td>
                    <td>
                    @if($m->cek_kategori())
                      {{$m->data_kategori->nama_kategori}}
                    @endif
                    </td>
                    <td>
                    <a href="{{url('menu/'.$m->id_menu.'/edit')}}"  class="btn btn-warning">Edit</a>
                    <a href="{{url('menu/'.$m->id_menu.'/hapus')}}" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
              </table>
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