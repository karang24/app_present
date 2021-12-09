<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class daysController extends Controller
{
    public function showData(){
        
        $nameAuth = Auth::user()->EMPLOYEE_ID;
        $id_unit = Auth::user()->UNIT_ID;

        if(Auth::user()->ROLE_ID == '1' || Auth::user()->ROLE_ID == '2' || Auth::user()->ROLE_ID == '5' || Auth::user()->ROLE_ID == '8')
        {
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

        return view('days',compact(['showUnit']));//'data','data1','dataPekerjaan','totalDays','finalDays','fixDays'
    }

    public function getEmployeeFromUnit(Request $request){
        $idUnit = $request->get('id');
		$tahun = date('Y');
        $data = DB::select("call spunitemp('".$idUnit."','".$tahun."')");    

        return response()->json($data);
    }

    public function filter_days_emp(Request $request){

        $emp_id   = $request->get('emp_id') ? $request->get('emp_id') : Auth::user()->EMPLOYEE_ID;
        $year     = $request->get('year');
        
        $dataDays = DB::select('call spfilter_days_emp_dataDays('.$emp_id.')');

        $countWD = DB::select('call spfilter_days_emp_countWD('. $emp_id.')');

        $dataPekerjaan = DB::select("call spfilter_days_emp_dataPekerjaan('$emp_id', '$year')");

        $totalDays = DB::select('call spfilter_days_emp_totalDays('.$emp_id.')');
        
        $finalDays = DB::select("call spFinalDays('$emp_id','$year')");
        $fixDays   = DB::select("call spGetScoreDays('$emp_id','$year')");         

        
        $data ['content']      = $dataDays;
        $data ['contentdua']   = $dataPekerjaan;
        $data ['contenttiga']  = $totalDays;
        $data ['contentempat'] = $countWD;
        $data ['contentlima']  = $finalDays;
        $data ['contentenam']  = $fixDays;

        return json_encode($data);

    }

    public function filter_days(Request $request){
        $emp_id   = $request->get('emp_id');
        $year     = $request->get('year');
        
        $dataDays = DB::select("call spfilter_days_emp_dataDays('$emp_id','$year')");

        $countWD = DB::select("call spfilter_days_emp_countWD('$emp_id','$year')");

        $dataPekerjaan = DB::select("call spfilter_days_emp_dataPekerjaan('$emp_id', '$year')");

        $totalDays = DB::select("call spfilter_days_emp_totalDays('$emp_id','$year')");
        
        $finalDays = DB::select("call spFinalDays('$emp_id','$year')");
        $fixDays   = DB::select("call spGetScoreDays('$emp_id','$year')");         

        
        $data ['content']      = $dataDays;
        $data ['contentdua']   = $dataPekerjaan;
        $data ['contenttiga']  = $totalDays;
        $data ['contentempat'] = $countWD;
        $data ['contentlima']  = $finalDays;
        $data ['contentenam']  = $fixDays;

        return json_encode($data);
    }

}