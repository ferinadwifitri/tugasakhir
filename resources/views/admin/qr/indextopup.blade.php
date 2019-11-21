@extends('admin.index')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
    <h1 style="margin-left: 15%">
        Pengisian Deposit Member
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
                    
                    // location.href=result.code;
                    try
                    {
                        console.log(result.code);
                        // $('#isi').text(result.code);
                        if(result.code > 0)
                        {
                          location.href='/scan/topup/'+result.code;
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