<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class edit_given_pointController extends Controller
{
	public function showElement(){
        $showAreaKinerja = DB::table('kinerja')->get();

        $areaHRD = DB::select("call splistinsertheader_kpi('1')");

        $areaPMO = DB::select("call splistinsertheader_kpi('2')");

        $areaUNIT = DB::select("call splistinsertheader_kpi('3')");                                    
		
        return view('edit_given_point',compact(['areaHRD','areaPMO','areaUNIT','showAreaKinerja']));
	}

    public function update(Request $request){

        $list = $request->get('list_final');

        if (is_array($list) || is_object($list)){ 
            foreach ($list as $key) {
                
                $listid = $key['list'];
                $status = $key['status'];

                DB::raw("call spupdateheader_kpi('".$listid."', '".$status."')");               
            }
            $msg['msg'] = 'Success Update';
        }

        return json_encode($msg);
    }    
	public function update_value(Request $request){

		$p_LIST_ID		=$request->get('list_id');
		$p_ROLE_ID 		=$request->get('role_id');
		$p_KINERJA_ID 	=$request->get('id_kinerja');
		$p_KPI_ID 		=$request->get('id_kpi');
		$p_KPI_NAME 	=$request->get('kpi_pmo');

        if ($p_LIST_ID=null&&$p_ROLE_ID =null&&$p_KINERJA_ID=null&&$p_KPI_ID ==null&&$p_KPI_NAME){
			$msg['msg'] = 'Data Not Complite';
		}else{
			DB::select("call spupdate('".$p_LIST_ID."','".$p_ROLE_ID."','".$p_KINERJA_ID."', '".$p_KPI_ID."','".$p_KPI_NAME."')");                   
			$msg['msg'] = 'Success Update';
		}
        return json_encode($msg);
    }
	public function delete_value(Request $request){

		$p_LIST_ID		=$request->get('list_id');
		$p_ROLE_ID 		=$request->get('role_id');
		$p_KINERJA_ID 	=$request->get('id_kinerja');
		$p_KPI_ID 		=$request->get('id_kpi');
		
		if ($p_LIST_ID=null&&$p_ROLE_ID =null&&$p_KINERJA_ID=null&&$p_KPI_ID ==null&&$p_KPI_NAME){
			$msg['msg'] = 'Data Not Complite';
		}else{
			DB::select("call spdeletemandays('".$p_LIST_ID."','".$p_ROLE_ID."','".$p_KINERJA_ID."', '".$p_KPI_ID."')");                   
			$msg['msg'] = 'Success Update';
		}
        return json_encode($msg);
    }
}



?>