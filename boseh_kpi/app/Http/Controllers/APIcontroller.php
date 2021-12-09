<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class APIcontroller extends Controller
{
    //
	
	//Function untuk Login
	
    function loginAndroid(Request $request) {
		$logins = DB::table('users')
		->where('email', $request->email)
		->where('password', $request->password)
		->get();

		if (count($logins) > 0) {
			foreach ($logins as $logg) {
			$result["success"] = "1";
			$result["message"] = "success";
		//untuk memanggil data sesi Login
			$result["id"] = $logg->id;
			$result["name"] = $logg->nama;
			$result["id_pegawai"] = $logg->nim;
			$result["email"] = $logg->email;
		}
			echo json_encode($result);
		} else {
		   $result["success"] = "0";
		   $result["message"] = "error";
		   echo json_encode($result);
		}
	}
}
