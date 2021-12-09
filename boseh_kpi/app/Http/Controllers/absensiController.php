<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Mail;
use Illuminate\Support\Facades\Crypt;
class AbsensiController extends Controller
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
	 public function showData(){

		$id_name = Auth::user()->id_pegawai;
		$id_unit = Auth::user()->UNIT_ID;
		$bulan         = DB::table('t_bulan')->get();
    	$tahun         = DB::table('t_tahun')->get();
		//$query =  DB::select("call spViewAbsen('$id_name')");	
		//dd(Auth::user()->role_id);
		if(Auth::user()->role_id == '4'){

            $showUnit  = DB::table('divisi')->where('divisi','=',$unitAuth)
                                          ->whereNotIn('divisi',['HRD','NON Unit'])->get();            

        }else if(Auth::user()->role_id == '6' || Auth::user()->role_id == '7'){

            if(Auth::user()->role_id == '6'){

                $showUnit = DB::table('divisi')->whereIn('divisi',['BIM','ERP'])->get();

            }else{

                $showUnit = DB::table('divisi')->whereIn('divisi',['BILLING','EAI'])->get();

            }

        }else if(Auth::user()->role_id == '3'){

            $showUnit = DB::table('divisi')->where('divisi','=',$unitAuth)->get();

        }else{

            $showUnit = DB::table('divisi')->whereNotIn('divisi',['HRD','NON Unit'])->get();            
        }
		
		
		return view('absensi',compact(['showUnit','bulan','tahun']));
	}
	public function filter_absensi(Request $request){

		$emp_id   	= (int)$request->get('emp_id');
		$month    	= (int)$request->get('month');
		$year   	= (int)$request->get('year');
		//dd($emp_id );
		if($month == "komulatif"){
		    
		    $query =  DB::select("call spViewAbsenYear('$emp_id')");
		    
		}else{
		    
    		$query =  DB::select("call spViewReportNew($month,$year,$emp_id)");		    
		}
//dd($query );
		$data ['content'] = $query;		
        
        return json_encode($data);
	}
	public function getEmployeeFromUnit(Request $request){
        
       
        $idUnit  = $request->get('id');
        $empAuth = Auth::user()->id_pegawai;
        
        if(Auth::user()->role_id == '4'){
        $data = DB::table('pegawai')->where('id_pegawai','=',$empAuth)->get();
//dd($data);
        }
        else{
		$data = DB::table('pegawai')->join('jabatan','jabatan.id','=','pegawai.jabatan_id' )
									->join('divisi', 'divisi.id','=','jabatan.divisi_id')
									->where('divisi.id','=',$idUnit)
									->where('pegawai.user_status_id','=',1)
									->whereNotIn('divisi.id',[1])
									->whereNotIn('pegawai.id_pegawai',[1,2])
									->get();
		}

        return response()->json($data);
    }	
	public function getlocation(Request $request){
       
	   //dd($request);
	   $lat= $request->long;
	   $long= $request->lat;
		$data =DB::select("CALL jarak('$lat','$long')");

        return response()->json($data);
    }

 
    public function index()
    {
        return view('home');
    } 
	public function absen_harian()
    {
		$data = DB::table('t_absen_pegawai')
				->join('pegawai','t_absen_pegawai.id_pegawai','pegawai.id_pegawai')
				->join('jabatan','jabatan.id','pegawai.jabatan_id')
				->where('user_status_id','=',1)
				->where('t_absen_pegawai.tanggal','=',date('Y-m-d'))
				->join('t_shift','t_shift.id_shift','t_absen_pegawai.shift')
				->whereNotIn('nama', ["Administrator","Bey Arief Budiman"])->get() ;
		//$shift = DB::table('t_shift')->get();

		return view('Absensi/absen_harian',compact('data'));
		
    }
    public function testcapture()
    {
		$shift = DB::table('t_shift')->get();
		$tgl=date('Y-m-d');
		$id_pegawai =Auth::user()->id_pegawai;
		$check = DB::table('t_absen_pegawai')
				->where('id_pegawai','=',$id_pegawai)
				->where('tanggal','=',$tgl)
				->count();
		$checkshift = DB::table('t_absen_pegawai')
				
				->where('id_pegawai','=',$id_pegawai)
				->where('tanggal','=',$tgl)
				->get();
	//	dd($checkshift);
        return view('picture',compact('shift','check','checkshift'));
    }    
	
	public function detail($tanggal,$id)
    {
		
		$decrypted = Crypt::decryptString($id);
		$decrypted_date = Crypt::decryptString($tanggal);
		//dd($decrypted);
		$id_pegawai=(int)$decrypted;
		$data = DB::table('t_absen_pegawai')
					->leftjoin('detail_absen','detail_absen.id_pegawai','t_absen_pegawai.id_pegawai')
					->where('t_absen_pegawai.id_pegawai','=',$id_pegawai)
					->where('t_absen_pegawai.tanggal','=', $decrypted_date)
					->where('detail_absen.tanggal','=', $decrypted_date)
					->get();
		//dd($data);
        return view('Absensi/detail_absen',compact('data'));
    }
	
	 public function saveinput_absen(Request $request){

		dd($request);
		 $request->validate([
            'foto'      => 'required'
            
        ]);
      //  $upload_dir = somehow_get_upload_dir();  //implement this function yourself
		$id_pegawai =Auth::user()->id_pegawai;
		$provinsi =$request->provinsi;
		$kota =$request->kota;
		$kecamatan =$request->kecamatan;
		$desa =$request->desa;
		//$tanggal = date('Y-m-d', strtotime($request->tanggal));
		$tanggal=date('Y-m-d');;

		//dd($tanggl);
		$jam_masuk =$request->jam;
		$jam_pulang =$request->jam;
		$shift =$request->shift;
		$status =$request->status;
		//dd($id_pegawai);
        $upload_dir ='public/img/';

        $img = $request->foto;

        $img = str_replace('data:image/png;base64,', '', $img);

        $img = str_replace(' ', '+', $img);

        $data = base64_decode($img);
		
		//waktu shift
		$waktushift =DB::table('t_shift')->where('id_shift','=',$shift)->first();
		$waktuawal  = date_create($waktushift->jam_masuk);	
		//dd($waktuawal);
		$waktuakhir = date_create($jam_masuk); //waktu masuk
		if($waktuakhir > $waktuawal){
			$telat  = date_diff($waktuawal, $waktuakhir);
			$total_telat=$telat->h.":".$telat->i;
		}else{
			$total_telat="0:0";
		}
		
		$check =DB::table('t_absen_pegawai')->where('id_pegawai',$id_pegawai)->where('tanggal',$tanggal)->first();
		$count =DB::table('t_absen_pegawai')->where('id_pegawai',$id_pegawai)->where('tanggal',$tanggal)->count();
		
			
		//dd($count);
		
        $file = $upload_dir. time().'_'.Auth::user()->name.".png";
		if ($count == 0 ){
		
		$save_absen =DB::select("call absen_mandiri($id_pegawai,'$tanggal','$jam_masuk','$jam_pulang','$shift','$status','$total_telat')") ;
		$detail_absen =DB::select("call detail_absen_man($id_pegawai,'$tanggal', '$kota','$kecamatan','$desa','$file')"); 
        $success = file_put_contents($file, $data);
		}
		else{
			$waktu_absen =date_create($check->masuk);
			$time_now=date_create(date('H:i:s')); 
			$check_waktu  = date_diff($waktu_absen, $time_now);
			$waktu_check=$check_waktu->h;
			
			if ($waktu_check >= 2 ){
			$save_absen =DB::select("call absen_mandiri($id_pegawai,'$tanggal','$jam_masuk','$jam_pulang','$shift','$status','$total_telat')") ;
			$detail_absen =DB::select("call detail_absen_man($id_pegawai,'$tanggal', '$kota','$kecamatan','$desa','$file')"); 
			return back()->with('status', "Absen Tersimpan.");
			}else{
				//dd($waktu_check);
				return back()->withErrors(['msg', "Mau Kemana? Kan Baru Masuk"]);
			}
			
		}
		return back()->with('status', "Absen Tersimpan.");
        //header('Location: '.$_POST['return_url']);
		
    }       
    
    public function view_input()
    { 
		//$data = DB::select('Call sp_calon_siswa()');
        $data = DB::table('pegawai')->join('jabatan','jabatan.id','pegawai.jabatan_id')->where('user_status_id','=',1)->whereNotIn('nama', ["Administrator","Bey Arief Budiman"])->get();
		$shift = DB::table('t_shift')->get();
	//	dd($data);

        return view('Absensi/view_input_absen',compact('data','shift'));
    }
    public function save_absen(Request $request){
		dd($request);
           //      dd(count(array_filter($request->masuk)));
                for($a = 0; $a < sizeof($request->id) ; $a++){
                    
                    $id = $request['id'][$a];
                    $masuk = $request['masuk'][$a];
                    $pulang = $request['pulang'][$a];
                    $tanggal = $request['tanggal'];
                    $shift = $request['shift'][$a];
                    $ket = $request['ket'][$a];
//dd($shift);			
					if( $shift == "-Pilih Shift-"){
						$shift = 0;
						$telat = 0;

					}
								//	dd($shift);

					$cek_data = DB::table('t_absen_pegawai')->where('id_pegawai','=',$id)->where('tanggal','=',$tanggal)->count();
					//var_dump($cek_data);
					$total_telat=0;
					
					if ($cek_data > 0){
				

						if($shift > 0){
						$waktushift =DB::table('t_shift')->where('id_shift','=',$shift)->first();
						$waktuawal  = date_create($waktushift->jam_masuk); //waktu shift
						$waktuakhir = date_create($masuk); //waktu masuk
						$telat  = date_diff($waktuawal, $waktuakhir);
						$total_telat=$telat->h.":".$telat->i;
							//dd($total_telat);
						}
					//dd($telat);
                    $save = DB::select("call sp_update_absen($id,'$tanggal','$masuk','$pulang','$shift','$total_telat')");
					
					

					}else{
						if($shift > 0){
						$waktushift =DB::table('t_shift')->where('id_shift','=',$shift)->first();
						//dd($shift);
						$waktuawal  = date_create($waktushift->jam_masuk); //waktu shift
						$waktuakhir = date_create($masuk); //waktu masuk
						$telat  = date_diff($waktuawal, $waktuakhir);
						$total_telat=$telat->h.":".$telat->i;
						//dd($telat);
						}
						if ($ket =='-Pilih Keterangan-'){
							$ket = 0;
						}
                    $save = DB::select("call sp_insert_absen($id,'$tanggal','$masuk','$pulang','$total_telat','$shift','$ket')");
					}

                   
                }

       return back()->with('status', "Data Tersimpan");
    }  

	public function rekap_absen(){
		
		$data = DB::table('t_absen_pegawai')->join('pegawai','t_absen_pegawai.id_pegawai','pegawai.id_pegawai')->join('jabatan','jabatan.id','pegawai.jabatan_id')->where('user_status_id','=',1)->join('t_shift','t_shift.id_shift','t_absen_pegawai.shift')->whereNotIn('nama', ["Administrator","Bey Arief Budiman"])->get() ;
		//$shift = DB::table('t_shift')->get();

		return view('Absensi/rekap_absen',compact('data'));
	}	
	public function point_karyawan(){
		
		$data =DB::select("call sp_point_karyawan()") ;
		//$shift = DB::table('t_shift')->get();

		return view('Absensi/point_karyawan',compact('data'));
	}
}

