<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Member;
use App\Transaksi;
use PDF;
use Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class LaporanController extends Controller
{
    
    public function rekaptransaksi()
    {
        $transaksi = Transaksi::all();
        $tgl_awal = date('Y-m-d');
        $tgl_akhir = date('Y-m-d');

        $data = Transaksi::whereBetween('tanggal',[$tgl_awal,$tgl_akhir])->where('status_bayar_id',2)->get();

        $total = 'Rp. '.number_format($data->sum('total_harga'),0,",",".");

        $list = $data->all();   

        return view('admin/laporan/rekaptransaksi', ['transaksi'=>$transaksi, 'tgl_awal'=>$tgl_awal, 'tgl_akhir'=>$tgl_akhir, 'data'=> $data, 'total'=>$total, 'list'=>$list]);
    }

    public function postrekaptransaksi(Request $request)
    {
        $transaksi = Transaksi::all();
        $this->validate($request,[
                  'tgl_awal' => 'required|date',
                  'tgl_akhir' => 'required|date',
              ]);
              
        $tgl_awal = date('Y-m-d',strtotime($request->get('tgl_awal')));
        $tgl_akhir = date('Y-m-d',strtotime($request->get('tgl_akhir')));

        $data = Transaksi::whereBetween('tanggal',[$tgl_awal,$tgl_akhir])->where('status_bayar_id',2)->get();

        $total = 'Rp. '.number_format($data->sum('total_harga'),0,",",".");

        $list = $data->all();   
        
        // return redirect('/rekapisisaldo');
        return view('admin/laporan/rekaptransaksi', ['transaksi'=>$transaksi, 'tgl_awal'=>$tgl_awal, 'tgl_akhir'=>$tgl_akhir, 'data'=> $data, 'total'=>$total, 'list'=>$list]);
    }

    public function excelrekaptransaksi(Request $request)
    {
        $tgl_awal = date('Y-m-d',strtotime($request->get('tgl_awal')));
        $tgl_akhir = date('Y-m-d',strtotime($request->get('tgl_akhir')));

        $data = Transaksi::whereBetween('tanggal_order',[$tgl_awal,$tgl_akhir])->where('kode_status',4)->get();
        $total = 'Rp. '.number_format($data->sum('total_harga'),0,",",".");

        $list = $data->all();
        $this->ttl = number_format($data->sum('total_harga'),0,",",".");
        $this->tglawal = $request->tgl_awal;
        $this->tglakhir = $request->tgl_akhir;
            
        if ($request->tgl_awal=="" || $request->tgl_akhir=="") {
                Session::flash("flash_notification",[
                    "level"=>"warning",
                    "message"=>"Pilih Tanggal!"
                    ]);
            }
        else{        
            $transaksisArray = []; 

                // Define the Excel spreadsheet headers
                $transaksisArray[] = ['No','No Transaksi','Tanggal Order','Tanggal Pengembalian','Nama Pelanggan','Tarif'];

                // Convert each member of the returned collection into an array,
                // and append it to the payments array.
                $i=1;
                foreach ($list as $l) {
                    $transaksisArray[] = [$i,
                    $l->no_transaksi,
                    $l->tanggal_order,
                    $l->tanggal_selesai,
                    $l->nama_pelanggan,
                    number_format($l->total_harga,0,",",".")
                    ];
                     $i++;
                }

                // Generate and return the spreadsheet
                Excel::create('Laporan Transaksi Periode '.$this->tglawal.' s.d '.$this->tglakhir, function($excel) use ($transaksisArray) {

                    // Set the spreadsheet title, creator, and description
                    $excel->setTitle('Transaksi');
                    $excel->setCreator('Admin')->setCompany('Tiara Laundry');
                    $excel->setDescription('File Aset');

                    // Build the spreadsheet, passing in the payments array
                    $excel->sheet('sheet1', function($sheet) use ($transaksisArray) {

                        $hitung = count($transaksisArray)+4;
                        $lokasi = $hitung+1;

                        $sheet->setOrientation('landscape');
                        $sheet->setPageMargin(array(0.25, 0.30, 0.25, 0.30));

                        $sheet->cells('A1:F'.$hitung, function($cells) {
                            $cells->setAlignment('center');                            
                        });

                        $sheet->cells('E6:E'.$hitung, function($cells) {
                            $cells->setAlignment('left');                            
                        });

                        $sheet->cells('F6:F'.$hitung, function($cells) {
                            $cells->setAlignment('right');                            
                        });

                        $sheet->mergeCells('A1:F1');
                        $sheet->cells('A1', function($cells) { 
                            $cells->setAlignment('center');                           
                            $cells->setValue("TIARA LAUNDRY");                            
                        });

                        $sheet->mergeCells('A2:F2');
                        $sheet->cells('A2', function($cells) { 
                            $cells->setAlignment('center');                           
                            $cells->setValue("Laporan Transaksi Jasa Laundry");                            
                        });

                        $sheet->mergeCells('A3:F3');
                        $sheet->cells('A3', function($cells) { 
                            $cells->setAlignment('center');                           
                            $cells->setValue("Periode dari ".$this->tglawal." s.d ".$this->tglakhir);                            
                        });

                        $sheet->fromArray($transaksisArray, null, 'A5', false, false);
                        $sheet->setBorder('A5:F'.$lokasi, 'thin');
                        $sheet->cells('A5:F5', function($cells) { 
                            $cells->setAlignment('center');            
                            $cells->setFont(array('bold' => true));                            
                        });

                        $sheet->mergeCells('A'.$lokasi.':E'.$lokasi);
                        $sheet->cells('A'.$lokasi, function($cells) { 
                            $cells->setAlignment('left');

                            $cells->setValue("Total Transaksi Jasa Laundry");
                            $cells->setFont(array('bold' => true));

                        });

                        $sheet->cells('F'.$lokasi, function($cells) { 
                            $cells->setAlignment('right');                           
                            $cells->setValue("Rp. ".$this->ttl);                            
                        });

                       
                        $sheet->setWidth(array(
                            'A'     =>  5,
                            'B'     =>  15,
                            'C'     =>  20,
                            'D'     =>  25,
                            'E'     =>  25,
                            'F'     =>  15
                        ));
                    });

                })->download('xlsx');
            }

        return redirect('admin/laporan/rekaptransaksi');
    
    }


    
    

   

    
    

    
}
