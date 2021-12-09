<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class input_given_pointController extends Controller
{

    public function showAreaKinerja(){
        $showAreaKinerja = DB::table('kinerja')->get();

        return view('input_given_point',compact(['showAreaKinerja']));
    }


  public function inputAreaKinerjaHrd(Request $request){

        $areakinerjahrd = $request->get('areahrd');
        $kpihrd = $request->get('kpihrd');
        $bobothrd = $request->get('bobothrd');

        DB::select("call spInsertKinerja('$kpihrd','$areakinerjahrd','$bobothrd',1)");

        $msg['msg'] = 'Success Insert'; 

        return json_encode($msg);
  }

    public function inputAreaKinerjaSPV(Request $request){

        $areakinerjapmo = $request->get('areapmo');
        $kpipmo = $request->get('kpipmo');
        $bobotpmo = $request->get('bobotpmo');

        DB::select("call spInsertKinerja('$kpipmo','$areakinerjapmo','$bobotpmo',2)");

        $msg['msg'] = 'Success Insert';

        return json_encode($msg);
    }

    public function inputAreaKinerjaLeader(Request $request){

        $areakinerjaunit = $request->get('areaunit');
        $kpiunit = $request->get('kpiunit');
        $bobotunit = $request->get('bobotunit');

        DB::select("call spInsertKinerja('$kpiunit','$areakinerjaunit','$bobotunit',3)");

        $msg['msg'] = 'Success Insert';

        return json_encode($msg);
    }
}
?>