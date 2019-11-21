@extends('admin.index')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Transaksi
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
              <h3 class="box-title">Kelola Detail Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Menu</th>
                  <th>Transaksi</th>
                  <th>Jumlah</th>
                  <th>Catatan</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($detail_transaksi as $det_trans)
                  <tr>
                    <td>{{$det_trans->id_detail_transaksi}}</td>
                    <td>{{$det_trans->menu_id}}</td>
                    <td>{{$det_trans->transaksi_id}}</td>
                    <td>{{$det_trans->jumlah}}</td>
                    <td>{{$det_trans->catatan}}</td>
                    
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