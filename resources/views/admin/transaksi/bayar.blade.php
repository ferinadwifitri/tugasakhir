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
  
  
</div>
     <div class="panel panel-default">
  <div class="panel-heading">
    <strong>Laporan Transaksi</strong>
  </div>
  <div id="print" class="panel-body">
    
    <p class="text-center" style="font-size: 18px;">Daftar Pesanan </p>
    
    <hr>
        <table  class="table table-bordered table-striped">
          <tr>
            <th width="1%"><center>No</th>
            <th><center>Nama Menu</th>
            <th><center>Jumlah</th>
            <th><center>Harga</th>
            <th><center>Catatan</center></th>
            <th><center>Total</center></th>
          </tr>
        <?php $no = 1; ?>
        @foreach($list as $l)
          <tr>
            <td><center>{{ $no++ }}</td>
            <td><center>{{ $l->Menu->nama }}</td>
            <td><center>{{ $l->jumlah}}</td>
            <td><center>{{ $l->total_harga }}</td>
            <td><center>{{ $l->catatan}}</center></td>
            <td><center>{{ $l->total_harga}}</center></td>
            
          </tr>


        @endforeach
          <tr>
            <td colspan="5">Total Transaksi</td>
            <td><center><b>{{ $total }}</b></td>
          </tr>
            <a href="/scan/{{$l->transaksi_id}}"  class="btn btn-warning">Scan</a>

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

