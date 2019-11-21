@extends('admin.index')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
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
              <h3 class="box-title">Kelola Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nomor Meja</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($meja as $m)
                  <tr>
                    <td>{{$m->no_meja}}</td>
                    <td>{{$m->password}}</td>
                    <td>
                    <a href="{{url('meja/'.$m->no_meja.'/edit')}}"  class="btn btn-warning">Edit</a>
                    <a href="{{url('meja/'.$m->no_meja.'/hapus')}}" class="btn btn-danger">Hapus</a>
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