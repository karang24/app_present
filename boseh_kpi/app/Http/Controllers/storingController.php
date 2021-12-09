<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Mail;
use Illuminate\Support\Facades\Crypt;
class storingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function testcapture()
    {
        return view('picture');
    }
    
    public function view_input()
    { 
		//$data = DB::select('Call sp_calon_siswa()');
        $data = DB::table('storing')->select('Nama_shelter')->groupBy('Nama_shelter')->get();
	//	dd($data);

        return view('storing/view_input_storing',compact('data'));
    }
	
    public function save_storing(Request $request){
		
           //      dd(count(array_filter($request->masuk)));
                for($a = 0; $a < sizeof($request->Nama_shelter) ; $a++){
					$Nama_shelter = $request['Nama_shelter'][$a];
					if($request['jumlah'][$a] !=null){
						$jumlah = $request['jumlah'][$a];
					}else{
						$jumlah =0;
					}
                    $tanggal = date('d-M-Y',strtotime($request['tanggal']));
					//dd($tanggal);
					$save_storing= DB::select("call sp_insert_storing('$Nama_shelter',$jumlah ,'$tanggal')");
                }
       return back()->with('status', "Data Tersimpan");
    }  

	public function rekap_storing(){
		
		$data = DB::table('storing')->get();
		//$shift = DB::table('t_shift')->get();
		$shelter = DB::table('storing')->select('Nama_shelter')->groupBy('Nama_shelter')->get();
		$tanggal = DB::table('storing')->select('Tanggal')->groupBy('Tanggal')->orderByDesc('Tanggal')->get();
		return view('storing/rekap_storing',compact('data','shelter','tanggal'));
	}	
	public function point_karyawan(){
		
		$data =DB::select("call sp_point_karyawan()") ;
		//$shift = DB::table('t_shift')->get();

		return view('Absensi/point_karyawan',compact('data'));
	}
}

