<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Aplikasi Pengelolaan Jasa Laundry</title>

    <style type="text/css">
        table, td, th {
     border: 1px solid #ddd;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 50px;}

    </style>
</head>
<body>
        <center><h1>
            Tiara Laundry
        </h1></center>
        <center><p>Laporan Transaksi Jasa Laundry</p></center>
        <center><p>Periode dari {{date('d M Y', strtotime($tgl_awal))}} s.d {{date('d M Y', strtotime($tgl_akhir))}}</p></center>
        <center>
        <table>
            <tr>
            <th width="1%"><center>No</th>
            <th><center>Tanggal Order</th>
            <th><center>Tanggal Terima</th>
            <th><center>No Transaksi</th>
            <th><center>Nama Pelanggan</th>
            <th><center>Tarif</th>
          </tr>
        <?php $no = 1; ?>
        @foreach($list as $l)
          <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $l->tanggal_order}}</td>
            <td>{{ $l->tanggal_selesai}}</td>
            <td>{{ $l->no_transaksi }}</td>
            <td>{{ $l->nama_pelanggan }}</td>
            <td>Rp.  {{number_format($l->total_harga,0) }}</td>>
          </tr>
        @endforeach
          <tr>
            <td colspan="5">Total Transaksi Jasa Laundry</td>
            <td><b>{{ $total }}</b></td>
          </tr>
        </table>
</body>
</html>