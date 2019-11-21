@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1 style="margin-left: 25%">
        Pembayaran
    </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Scan QR Code</li>
      </ol>
  </section>

    <section class="content">
       <h4>
        @include('layouts.flash')
      </h4> 
     <div class="container">
    <body>
        <p id="isi"></p>
        <canvas style="margin-left: 10%"></canvas>
         <h4 style="margin-left: 18%">Scan QR Code</h4>
           <a style="margin-left: 15%" href="/transaksiberjalan" class="btn btn-sm btn-warning" data-toggle="modal"><i class="fa fa-times"></i> Tutup Halaman Pembayaran</a>
           <input type="text" name="id_member" id="id_member" value="{{$transaksi->member_id}}" hidden>
           <input type="text" name="id_transaksi" id="id_transaksi" value="{{$transaksi->id_transaksi}}" hidden>
         
        <hr>
        <select hidden></select>
        <hr>
        <ul></ul>
        
        <script type="text/javascript" src="{{asset('js/qrcodelib.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/webcodecamjs.js')}}"></script>
        <script type="text/javascript">
          var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                  resultFunction: function(result) {                  
                    var aChild = document.createElement('li');
                    aChild[txt] = result.format + ': ' + result.code;
                      document.querySelector('body').appendChild(aChild);
                      var id_member = document.getElementById('id_member').value;
                      var id_transaksi = document.getElementById('id_transaksi').value;
                      // location.href=result.code;
                      try
                      {
                          console.log(result.code);
                          // $('#isi').text(result.code);
                          if(result.code == id_member)
                          {
                           location.href='/bayar/'+result.code+'/'+id_transaksi;
                          }
                          else
                          {
                            alert("Data QR Code yang Dipindai Salah");
                          }
                      } 
                        catch(e){
                      }
                  }
              };
            var decoder = new WebCodeCamJS("canvas").buildSelectMenu('select', 'environment|back').init(arg).play();
            /*  Without visible select menu
                var decoder = new WebCodeCamJS("canvas").buildSelectMenu(document.createElement('select'), 'environment|back').init(arg).play();
            */
            document.querySelector('select').addEventListener('change', function(){
              decoder.stop().play();
            });
        </script>


    </body>
    </div>
  </section>
</div>
@endsection