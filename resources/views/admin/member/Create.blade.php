@extends('admin.index')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Member
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
              <h3 class="box-title">Tambah Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{url('/member/simpan')}}">
                <!-- untuk mengirim token -->
                {{csrf_field()}}

              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Input Alamat">
                </div>
                <div class="form-group">
                  <label for="no_telp">Nomor Telepon</label>
                  <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Input Nomor Telepon">
                </div>
                <div class="form-group">
                  <label for="saldo">Saldo</label>
                  <input type="text" class="form-control" name="saldo" id="saldo" placeholder="Input Saldo">
                </div>
                <div class="form-group">
                  <label for="tgl_reg">Tanggal Registrasi</label>
                  <input type="date" class="form-control" name="tgl_reg" id="tgl_reg" placeholder="Tanggal Registrasi">
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Input E-mail">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" id="password" placeholder="Input Password">
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