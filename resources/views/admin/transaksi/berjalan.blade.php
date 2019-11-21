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
                  
                  <th>ID Transaksi</th>
                  <th>Meja</th>
                  <th>Tanggal</th>
                  <th>Status Bayar</th>
                  <th>Nama</th>
                  
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($transaksi as $trans)
                  <tr>
                    
                    <td>{{$trans->id_transaksi}}</td>
                    <td>{{$trans->meja_id}}</td>
                    <td>{{$trans->tanggal}}</td>
                    <td>{{$trans->Status_bayar->keterangan}}</td>
                    <td>{{$trans->Member->nama}}</td>
                    
                    <td>
                      <a href="{{url('transaksi/'.$trans->id_transaksi.'/selesai')}}"  class="btn btn-warning">Selesai</a> - 
                      
                      <a href="{{url('transaksi/'.$trans->id_transaksi.'/bayar')}}"  class="btn btn-warning">Pembayaran</a>
                      
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