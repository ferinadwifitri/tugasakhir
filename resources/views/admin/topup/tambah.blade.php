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
              <h3 class="box-title">Pengisian Deposit Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="{{url('/topup/proses')}}">
                <!-- untuk mengirim token -->
                {{csrf_field()}}

              <div class="box-body">

                <div class="form-group">
                  <label for="id_member">ID Member</label>
                  <input type="text" class="form-control" id="id_member" name="id_member" value="{{$member->id_member}}" readonly required>
                </div>

              <div class="form-group">
                  <label for="tanggal">Tanggal Pengisian</label>
                  <input type="date" class="form-control" name="tanggal" id="tanggal" value={{$date}} readonly required>
              </div>
                
              <div class="form-group">
                  <label for="nominal">Nominal</label>
                  <input type="text" class="form-control" name="nominal" id="nominal" >
                </div>

              

              <!-- <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                  <label for="tanggal" class="col-sm-2 control-label">Tanggal Pengisian</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{$date}}" readonly required>                                    
                        @if ($errors->has('tanggal'))
                     <span class="help-block">
                     <strong>{{ $errors->first('tanggal') }}</strong>
                     </span>
                        @endif
                     </div>
              </div>
              <div class="form-group{{ $errors->has('nominal') ? ' has-error' : '' }}">
                  <label for="nominal" class="col-sm-2 control-label">Nominal</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nominal" name="nominal" >                                    
                        @if ($errors->has('nominal'))
                     <span class="help-block">
                     <strong>{{ $errors->first('nominal') }}</strong>
                     </span>
                        @endif
                     </div>
              </div> -->
                 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah Deposit</button>
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