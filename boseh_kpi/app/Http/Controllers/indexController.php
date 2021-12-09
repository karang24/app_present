<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Employee;

class indexController extends Controller {
	public function showElement(Request $request){
		$roleAuth = Auth::user()->ROLE_ID;
		$nameAuth = Auth::user()->EMPLOYEE_NAME;
		$tahun = DB::table('t_tahun')->get();
		Auth::user()->dashboard = 1;
		session(["avatar" => Employee::find(Auth::user()->EMPLOYEE_ID)->avatar]);
		return view('index',compact(['nameAuth', 'tahun']));
	}

	public function showElementyf(Request $request){
		$roleAuth = Auth::user()->ROLE_ID;
		$nameAuth = Auth::user()->EMPLOYEE_ID;
		Auth::user()->dashboard = 2; 
		$result = DB::table('employee')->where('employee.EMPLOYEE_ID','=',$nameAuth)
							->get();

		return view('index',compact(['yfAUTH','nameAuth','result']));
	}	
	public function dashkinerja(Request $request){
		$roleAuth = Auth::user()->ROLE_ID;
		$nameAuth = Auth::user()->EMPLOYEE_ID;
		Auth::user()->dashboard = 2; 
		$result = DB::table('employee')->where('employee.EMPLOYEE_ID','=',$nameAuth)
							->get();

		return view('dasboard_kinerja',compact(['yfAUTH','nameAuth','result']));
	}
	
	public function showGraphic(Request $request){
		$roleAuth = Auth::user()->ROLE_ID;
		$nameAuth = Auth::user()->EMPLOYEE_NAME;
		$tahun = DB::table('t_tahun')->get();
		Auth::user()->dashboard = 1;
		session(["avatar" => Employee::find(Auth::user()->EMPLOYEE_ID)->avatar]);
		return view('graf_rpt_kinerja',compact(['nameAuth', 'tahun']));
	}
  
	public function searchGraphic(Request $request){
		$roleAuth = Auth::user()->ROLE_ID;
		$nameAuth = Auth::user()->EMPLOYEE_ID;
		$pr_tahun = $request->get('p_tahun');
		if($request -> ajax()){
		  //$temp = DB::select("CALL spDashGraf_Mnd('".$nameAuth."', '".$pr_tahun."', '".$roleAuth."')");
		  $temp = DB::select("call spchartkinerja('$pr_tahun')");	
		  $x = json_encode($temp);
		  return $x;
		}
	}
	


	public function photo(Request $request){
	   if($request->hasFile('avatar')){
			$avatar   = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300,300)->save(public_path('/avatars/' . $filename));

			$user = Auth::user();
			$user->avatar = $filename;
			$user->save(); 
		}
		
		return view('index');
	}
	
	public function Graf_Emp(Request $request){
		$roleAuth = Auth::user()->ROLE_ID;
		$nameAuth = Auth::user()->EMPLOYEE_ID;
		$projectname = $request->get('nama');
		$result = DB::select("CALL spDashGraf_Emp('".$nameAuth."', '".$projectname."', '".$roleAuth."')");
				
		return json_encode($result);
	}

	public function Graf_Evo(Request $request){
		$roleAuth = Auth::user()->ROLE_ID;
		$nameAuth = Auth::user()->EMPLOYEE_ID;
		$pr_tahun = $request->get('p_tahun');
		if($request -> ajax()){
			$temp =	DB::select("CALL spDashGraf_Evo('".$nameAuth."', '".$pr_tahun."', '".$roleAuth."')");
			$x = json_encode($temp);
			return $x;
		}
	}

	public function Graf_Mnd(Request $request){
		$roleAuth = Auth::user()->ROLE_ID;
		$nameAuth = Auth::user()->EMPLOYEE_ID;
		$pr_tahun = $request->get('p_tahun');
		if($request -> ajax()){
			$temp = DB::select("CALL spDashGraf_Mnd('".$nameAuth."', '".$pr_tahun."', '".$roleAuth."')");
			$x = json_encode($temp);
			return $x;
		}
	}

	public function showProjectbyYear(Request $request){
		$roleAuth = Auth::user()->ROLE_ID;
		$nameAuth = Auth::user()->EMPLOYEE_ID;
		$pr_tahun = $request->get('p_tahun');
		$projectname =	DB::select("CALL spDashshowProjectbyYear('".$nameAuth."', '".$pr_tahun."', '".$roleAuth."')");
		
		return response()->json($projectname);
	}
}