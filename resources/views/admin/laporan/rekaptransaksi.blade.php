@extends('admin.index')

@section('content')

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> Laporan Transaksi</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="panel panel-default">
  <div class="panel-heading">
    <strong>Tanggal Laporan Transaksi</strong> <br>
  <small>*Masukan mulai dari tanggal awal hingga tanggal tertentu</small>
  </div>
  <div class="panel-body">
    <form action="{{ url('/laporan/Transaksi') }}" method="post">{{ csrf_field() }}
      <div>
        <div class="col-sm-3">
          <div class="form-group">
            <input type="date"  data-date-format="yyyy-mm-dd" class="form-control" name="tgl_awal" placeholder="Dari Tanggal" required>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <input type="date" data-date-format="yyyy-mm-dd" class="form-control" name="tgl_akhir" placeholder="Sampai Tanggal" required>
          </div>
        </div>
        <div class="col-sm-4">
          <!-- <input type="hidden" name="_token" value="{{ Session::token() }}"><br><br> -->
          <button class="btn btn-default" type="submit" ><span class="glyphicon glyphicon-eye-open" name="rekapsewa"></span> Lihat Laporan</button>
        </div>
      </div>
    </form>
    <form method="post" action="{{ url('/laporan/exceltransaksi') }}" class="text-left">{{ csrf_field() }}
      <input type="hidden" name="tgl_awal" value="{{ $tgl_awal }}">
      <input type="hidden" name="tgl_akhir" value="{{ $tgl_akhir }}">
      <a onclick="printContent('print')" class="btn btn-sm btn-warning"><i class="fa fa-print"></i> Cetak</a>
      <button class="btn btn-sm btn-success"><i class="fa fa-download"></i>  Unduh</button>
    </form>
  </div>
</div>
     <div class="panel panel-default">
  <div class="panel-heading">
    <strong>Laporan Transaksi</strong>
  </div>
  <div id="print" class="panel-body">
    
    <p class="text-center" style="font-size: 18px;">Laporan Transaksi</p>
    <p class="text-center">Periode dari {{date('d M Y', strtotime($tgl_awal))}} s.d {{date('d M Y', strtotime($tgl_akhir))}}</p>
    <hr>
        <table  class="table table-bordered table-striped">
          <tr>
            <th width="1%"><center>No</th>
            <th><center>No Transaksi</th>
            <th><center>Tanggal Order</th>
            <th><center>Nama Pelanggan</th>
            <th><center>Jenis Pembayaran</center></th>
            <th><center>Total</center></th>
          </tr>
        <?php $no = 1; ?>
        @foreach($list as $l)
          <tr>
            <td><center>{{ $no++ }}</td>
            <td><center>{{ $l->id_transaksi }}</td>
            <td><center>{{ $l->tanggal}}</td>
            <td><center>{{ $l->Member->nama }}</td>
            <td><center>{{ $l->Pembayaran->keterangan}}</center></td>
            <td><center>{{ $l->total_harga}}</center></td>
            
          </tr>
        @endforeach
          <tr>
            <td colspan="5">Total Transaksi</td>
            <td><center><b>{{ $total }}</b></td>
          </tr>
        </table>
  </div>
</div>
</section></div>
@endsection
@section('jscript')
<script type="text/javascript">
//Date picker
      $('#datepicker').datepicker({
        autoclose: true,
        enableOnReadonly: true,
      });
      //Date picker
      $('#datepicker2').datepicker({
        autoclose: true,
        enableOnReadonly: true,
      });
      function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
@endsection

