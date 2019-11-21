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
              <form role="form" method="POST" action="{{url('/member/update')}}">
                <!-- untuk mengirim token -->
                {{csrf_field()}}

              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="{{$member->nama}}">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" value="{{$member->alamat}}">
                </div>
                <div class="form-group">
                  <label for="no_telp">Nomor Telepon</label>
                  <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{$member->no_telp}}">
                </div>
                <div class="form-group">
                  <label for="saldo">Saldo</label>
                  <input type="text" class="form-control" name="saldo" id="saldo" value="{{$member->saldo}}">
                </div>
                <div class="form-group">
                  <label for="tgl_reg">Tanggal Registrasi</label>
                  <input type="date" class="form-control" name="tgl_reg" id="tgl_reg" value={{"$member->tgl_reg"}}>
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="text" class="form-control" name="email" id="email" value="{{$member->email}}">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" id="password" value="{{$member->password}}">
                </div>
                <input type="hidden" id="id_member" name="id_member" value="{{$member->id_member}}">
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