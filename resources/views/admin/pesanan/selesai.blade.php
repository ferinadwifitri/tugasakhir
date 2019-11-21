@extends('admin.index')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi
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
              <h3 class="box-title">Kelola Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>ID Transaksi</th>
                  <th>Meja</th>
                  <th>Menu</th>
                  <th>Jumlah</th>
                  <th>Catatan</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pesanan as $psn)
                  <tr>
                    <td>{{$psn->id_detail_transaksi}}</td>
                    <td>{{$psn->Transaksi->id_transaksi}}</td>
                    <td>{{$psn->Transaksi->meja_id}}</td>
                    <td>{{$psn->Menu->nama}}</td>
                    <td>{{$psn->jumlah}}</td>
                    <td>{{$psn->catatan}}</td>
                    
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