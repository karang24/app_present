<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;

use Illuminate\Http\Request;
use DB;


class userController extends Controller
{
    public function showElement(){

        $unitAuth      = Auth::user()->role_id;                
    	$bulan         = DB::table('t_bulan')->get();
    	$role         = DB::table('role')->get();
    	$pegawai         = DB::table('pegawai')->whereNotIn('id_pegawai',[1,2])->where('user_status_id','=',1)->get();
    	$tahun         = DB::table('t_tahun')->get();
    	$roleHrd       = DB::table('role')->select('ROLE_ID')
                                          ->where('ROLE_NAME','=','HRD')
                                          ->get();
    	return view('auth/register',compact(['role','pegawai']));
    }   
	public function view_user(){
       	$user         = DB::table('users')->join('role','role.ROLE_ID','=','users.role_id')->get();
    

    	return view('auth/view_user',compact(['user']));
    }	
	public function data_pegawai(){
    	$pegawai = DB::table('pegawai')->join('jabatan','pegawai.jabatan_id','=','jabatan.id')->get();
       	return view('auth/data_pegawai',compact(['pegawai']));
    }
	public function gantipass(){
		$id_pegawai =Auth::user()->id_pegawai;
    	$pass_before = DB::table('users')->where('id_pegawai','=',$id_pegawai)->first();
       	return view('auth/gantipass',compact(['pass_before']));
    }	
	
	public function prosesgtpass(Request $request){
    	 $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
           
		return back()->with('status', "Password Terupdate");

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

   

}