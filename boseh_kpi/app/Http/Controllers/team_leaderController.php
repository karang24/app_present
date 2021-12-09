<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class team_leaderController extends Controller
{
    public function showElement(){

        $unitAuth      = Auth::user()->UNIT_ID;                
    	$bulan         = DB::table('t_bulan')->get();
    	$tahun         = DB::table('t_tahun')->get();
    	$roleHrd       = DB::table('role')->select('ROLE_ID')
                                          ->where('ROLE_NAME','=','HRD')
                                          ->get();
                                          
        $listInsert = DB::select('call splistinsertheader_kpi(1)'); 
        $countlist     = count($listInsert);
                
        if(Auth::user()->ROLE_ID == '4'){

            $showUnit  = DB::table('divisi')->where('divisi','=',$unitAuth)
                                          ->whereNotIn('divisi',['HRD','NON Unit'])->get();            

        }else if(Auth::user()->ROLE_ID == '6' || Auth::user()->ROLE_ID == '7'){

            if(Auth::user()->ROLE_ID == '6'){

                $showUnit = DB::table('divisi')->whereIn('divisi',['BIM','ERP'])->get();

            }else{

                $showUnit = DB::table('divisi')->whereIn('divisi',['BILLING','EAI'])->get();

            }

        }else if(Auth::user()->ROLE_ID == '3'){

            $showUnit = DB::table('divisi')->where('divisi','=',$unitAuth)->get();

        }else{

            $showUnit = DB::table('divisi')->whereNotIn('divisi',['HRD','NON Unit'])->get();            
        }
        
    	return view('team_leader',compact(['bulan','tahun','roleHrd','listInsert','countlist','showUnit']));
    }

    public function getEmployeeFromUnit(Request $request){
        
        $idUnit  = $request->get('id');
        $empAuth = Auth::user()->EMPLOYEE_ID;
        		$tahun = date('Y');

        if(Auth::user()->ROLE_ID == '4'){
        $data = DB::select('call spGetEmployeeFromUnitLogin('.$empAuth.')');}
        else{
        $data = DB::select("call spGetEmployeeFromUnit('".$idUnit."', '".$tahun."')");}

        return response()->json($data);
    }

    public function getEmployeeFromUnit1(Request $request){

        $idUnit = $request->get('id');
		$tahun = date('Y');
        $nameAuth = Auth::user()->EMPLOYEE_NAME;

        $data = DB::select('call spGetEmployeeFromUnit('.$idUnit.','.$tahun.')');

        return response()->json($data);
    }    

    public function filter_hrd(Request $request){
    	
        $idEmployee       = $request->get('nama');
    	$idBulan          = $request->get('bulan');
    	$idTahun          = $request->get('tahun');
        $idRole           = $request->get('role');

    	$resultHrd        = DB::select("call spView('$idEmployee','$idBulan','$idTahun','$idRole')");
        $data ['content'] = $resultHrd;
        
        return json_encode($data);
    }

    public function insert_hrd(Request $request){
                
        $nama   = $request->get('nama');
        $bulan  = $request->get('bulan');
        $tahun  = $request->get('tahun');
        $kritik = $request->get('kritik');
        $total  = $request->get('total');
        $role   = $request->get('role');
        $list   = $request->get('list_bobot');
        
        $compareDB =  DB::select("call spcompareDBinserheader_kpi('$nama', '$bulan', '$tahun', '$role')");

        if($compareDB == null){

            $a = DB::select("call spinsertpenilaiankpi('".$nama."', '".$bulan."', '".$tahun."', '".$role."', '".$kritik."', '".$total."')");

            $b = DB::table('penilaian')->select('PENILAIAN_ID')
                                      ->orderby('PENILAIAN_ID','DESC')                                      
                                      ->take(1)
                                      ->get();           
			
            $getLastID = json_encode($b[0]->PENILAIAN_ID);

            if (is_array($list) || is_object($list)){                                 
                foreach ($list as $key) {
                    $listid = $key['list_id'];
                    $bobot = $key['bobot'];
                    DB::select("call spinsertpenilaian_hasil_kinerja('".$getLastID."', '".$listid."', '".$bobot."')");
                }
                $msg['msg'] = 'Success Insert';
            }else{
                $msg['msg'] = 'Assembly Error!';
            }

        }else{

            $msg['msg'] = 'Data is already available!';

        }  
       
        return json_encode($msg);
    }
	public function update_hr_nilai(Request $request){
		$hasil_id = $request->get('hr_id');
		$bobot = $request->get('hr_nilai');
		//dd(bobot);

		$updateArr = array('bobot' => $bobot);
		//dd($updateArr);
		DB::table('hasil_kinerja')
			->where('HASIL_KINERJA_ID',$hasil_id)
			->update($updateArr);
		$msg['msg'] = 'Success Update';

		return json_encode($msg);
	}
	public function delete_holiday(Request $request){
		$holiday_id = $request->get('holiday_id');
		DB::table('holiday')
			->where('day_id', '=', $holiday_id)
			->delete();
		$msg['msg'] = 'Success Delete';
		return json_encode($msg);
	}	
}