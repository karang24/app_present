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
	public function showData(){

		$id_name = Auth::user()->EMPLOYEE_ID;
		$id_unit = Auth::user()->UNIT_ID;
		
		//$query =  DB::select("call spViewAbsen('$id_name')");	

		if(Auth::user()->ROLE_ID == '1' || Auth::user()->ROLE_ID == '2' || Auth::user()->ROLE_ID == '5' || Auth::user()->ROLE_ID == '8'){

			$showUnit = DB::table('unit')->whereNotIn('UNIT',['HRD','NON Unit'])
			                             ->get();

		}else if(Auth::user()->ROLE_ID == '3'){

			$showUnit = DB::table('unit')->where('UNIT_ID','=',$id_unit)
			                             ->whereNotIn('UNIT',['HRD','NON Unit'])
										 ->get();

		}else if(Auth::user()->ROLE_ID == '6' || Auth::user()->ROLE_ID == '7'){

			if(Auth::user()->ROLE_ID == '6'){

				$showUnit = DB::table('unit')->whereIn('UNIT_ID', array(1,3))
											 ->get();
			}else{

				$showUnit = DB::table('unit')->whereIn('UNIT_ID', array(2,4))
											 ->get();
			}
			
		}
		
		
		return view('absensi',compact(['showUnit']));
	}
	public function filter_absensi(Request $request){

		$emp_id   = $request->get('emp_id');
		$month   = $request->get('month');
		$year   = $request->get('year');
		dd($month );
		if($month == "komulatif"){
		    
		    $query =  DB::select("call spViewAbsenYear('$emp_id')");
		    
		}else{
		    
    		$query =  DB::select("call spViewReportNew('$month','$year','$emp_id')");		    
		}

		$data ['content'] = $query;		
        
        return json_encode($data);
	}


	public function view_input()
    { 
		//$data = DB::select('Call sp_calon_siswa()');
			$data = DB::table('pegawai')->where('user_status_id','=',1)->whereNotIn('nama','=',"Administrator")->get();

		//dd($data);

        return view('Absensi/view_input_absen',compact('data'));
    }	
	public function view_konfirmasi(Request $request)
    { 
		$id = "";
		$jejangop  = "";
		$jenjang = "";
		$kelas = "";
		$kelasop = "";
		
		$data1 = DB::select('Call sp_view_siswa()');
		$data = DB::table('t_siswa')
				->Join('t_anak','t_siswa.id_anak','=','t_anak.id_anak')
				->join('t_ayah','t_anak.id_ayah','=','t_ayah.id_ortu')
				->join('t_sekolah','t_sekolah.id','=','t_siswa.id_sekolah')
				->join('t_pendaftaran','t_siswa.id_anak','=','t_pendaftaran.id_anak')
				->join('t_jenjang_pendidikan','t_jenjang_pendidikan.id','=','t_pendaftaran.id_jenjang')
				->select('t_anak.nama_lengkap','t_anak.nama_panggilan','t_ayah.nama as ayah','t_ayah.email_ayah','no_kontak','t_sekolah.cabang','t_jenjang_pendidikan.jenjang','t_pendaftaran.id_jenjang', 't_siswa.*')
				->get();
		$sekolah = DB::table('t_sekolah')->get();
		//dd($data);
        return view('pembayaran/view_konfirmasi',compact('data','sekolah','id','jenjang','kelas','jejangop','kelasop'));
    }		
	

	

}