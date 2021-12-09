<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Mail;
use Illuminate\Support\Facades\Crypt;
class DashboardController extends Controller
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
	
	 public function dashboard_storing()
    {
		
		//$data = DB::select("call sp_dashboard()");
	//	dd($data);
        return view('/dashboard/dashboard_storing');
    } 	
	public function dashboard_sepeda()
    {
		
		//$data = DB::select("call sp_dashboard()");
	//	dd($data);
        return view('/dashboard/dashboard_sepeda');
    } 
	public function data_dashboard_sepeda()
    {
		
		$data = DB::select("call dashboard_spd()");
				//dd($data);

		
        return json_encode($data);
    }
		
		public function data_dashboard_stang()
    {
		
		$data = DB::select("call sp_stang()");
				//dd($data);

		
        return json_encode($data);
    }		
	public function data_dashboard_penggerak()
    {
		
		$data = DB::select("call sp_penggerak()");
				//dd($data);

		
        return json_encode($data);
    }	
	public function data_dashboard_ban_belakang()
    {
		
		$data = DB::select("call sp_ban_belakang()");
				//dd($data);

		
        return json_encode($data);
    }	
	public function data_dashboard_ban_depan()
    {
		
		$data = DB::select("call sp_ban_depan()");
				//dd($data);

		
        return json_encode($data);
    }
	
	public function data_dashboard_storing()
    {
		
		$data = DB::select("call sp_dashboard()");
	//	dd($data);
        return json_encode($data);
    }
	public function data_dashboard_storing2()
    {
		
		$data = DB::select("call sp_chart2()");
	//	dd($data);
        return json_encode($data);
    }
	public function data_dashboard_storing3()
    {
		
		$data = DB::select("call sp_storing_year()");
	//	dd($data);
        return json_encode($data);
    }
}