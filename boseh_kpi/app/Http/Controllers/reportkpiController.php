<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class reportkpiController extends Controller
{
	public function showElement(Request $request){

		//$EmployeeName = DB::table('employee')->whereNotIn('EMPLOYEE_NAME',['admin'])->get();
		$user_id = Auth::user()->id; 			
		$jabatan_id = DB::table('pegawai')->select('jabatan_id')->where('id_pegawai','=',$user_id)->first(); 	
		
		//$unitAuth = DB::table('divisi')->join('jabatan','divisi.id','jabatan.divisi_id')->where('jabatan.id','=',$jabatan_id->jabatan_id)->get(); 		
		//dd($unitAuth);		
		
		$bulan = DB::table('t_bulan')->get();
		$tahun = DB::table('t_tahun')->get();
		$target = DB::table('kpi_target')->get();

		
		if(Auth::user()->role_id == '4'){

            $showUnit  = DB::table('divisi')->join('jabatan','divisi.id','jabatan.divisi_id')->where('jabatan.id','=',$jabatan_id->jabatan_id)->get(); 		
		//dd($showUnit);            

        }else if(Auth::user()->role_id == '6' || Auth::user()->role_id == '7'){

            if(Auth::user()->role_id == '6'){

                $showUnit = DB::table('divisi')->whereIn('divisi',['BIM','ERP'])->get();

            }else{

                $showUnit = DB::table('divisi')->whereIn('divisi',['BILLING','EAI'])->get();

            }

        }else if(Auth::user()->role_id == '3'){

            $showUnit = DB::table('divisi')->join('jabatan','divisi.id','jabatan.divisi_id')->where('jabatan.id','=',$jabatan_id->jabatan_id)->get();

        }else{

            $showUnit = DB::table('divisi')->whereNotIn('divisi',['HRD','NON Unit'])->get();            
        }

		return view('reportkpi',compact(['showUnit','bulan','tahun','target']));
	}

	public function filter_report(Request $request){

		$idEmployee = $request->get('nama');
    	$idBulan = $request->get('bulan');
    	$idTahun = $request->get('tahun');

    	$result = DB::select("call spViewReportNew('$idBulan','$idTahun','$idEmployee')");
        $data ['content'] = $result;
        
        return json_encode($data);
	}

	public function getEmployeeFromUnit(Request $request){
        
        $idUnit  = $request->get('id');
        $empAuth = Auth::user()->EMPLOYEE_ID;
        
        if(Auth::user()->ROLE_ID == '4'){
        $data = DB::table('employee')->select('EMPLOYEE_ID','EMPLOYEE_NAME')
                                     ->where('UNIT_ID','=',$idUnit)
                                     ->where('EMPLOYEE_ID','=',$empAuth)
                                     ->get();
                                     }
        else{
        $data = DB::table('employee')->select('EMPLOYEE_ID','EMPLOYEE_NAME')
                                     ->where('UNIT_ID','=',$idUnit)
                                     ->whereNotIn('EMPLOYEE_NAME',['admin'])
                                     ->get();}

        return response()->json($data);
    }

}