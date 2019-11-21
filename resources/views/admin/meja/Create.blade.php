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
              <h3 class="box-title">Tambah Meja</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{url('/meja/simpan')}}">
                <!-- untuk mengirim token -->
                {{csrf_field()}}

              <div class="box-body">
                <div class="form-group">
                  <label for="no_meja">Nomor Meja</label>
                  <input type="text" class="form-control" id="no_meja" name="no_meja" placeholder="Input Nomor Meja">

                  <label for="password">Password</label>
                  <input type="text" class="form-control" id="password" name="password" placeholder="Input Password">
                </div>
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