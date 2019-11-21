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
      <h4>
        @include('layouts.flash')
      </h4> 
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Riwayat Pengisian Deposit</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <<th>ID Top Up</th>
                  <th>Tanggal Top Up</th>
                  <th>Nama Member</th>
                  <th>Saldo</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($topup as $tu)
                  <tr>
                     <td>{{$tu->id_topup}}</td>
                    <td>{{$tu->tanggal}}</td>
                    <td>{{$tu->Member->nama}}</td>
                    <td>{{$tu->nominal}}</td>
                    
                    
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