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
              <h3 class="box-title">Kelola Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No_telp</th>
                  <th>Saldo</th>
                  <th>Tanggal Registrasi</th>
                  <th>E-mail</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($member as $mbr)
                  <tr>
                    <td>{{$mbr->id_member}}</td>
                    <td>{{$mbr->nama}}</td>
                    <td>{{$mbr->alamat}}</td>
                    <td>{{$mbr->no_telp}}</td>
                    <td>{{$mbr->saldo}}</td>
                    <td>{{$mbr->tgl_reg}}</td>
                    <td>{{$mbr->email}}</td>
                    <td>{{$mbr->password}}</td>
                    <td>
                    <a href="{{url('member/'.$mbr->id_member.'/edit')}}"  class="btn btn-warning">Edit</a>
                    <a href="{{url('member/'.$mbr->id_member.'/hapus')}}" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
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