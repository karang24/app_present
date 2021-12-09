<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/view_input_absensi', 'AbsensiController@view_input');
Route::any('/save_input_absensi', 'AbsensiController@save_absen');
Route::any('/rekap_absen', 'AbsensiController@rekap_absen');
Route::any('/point_karyawan', 'AbsensiController@point_karyawan');
Route::any('/register_user', 'userController@showElement');
Route::any('/view_user', 'userController@view_user');
Route::any('/gantipass', 'userController@gantipass');
Route::any('/prosesgtpass', 'userController@prosesgtpass');
Route::any('/detail_absensi/{tanggal}/{id}', 'AbsensiController@detail');


Route::any('/data_pegawai', 'userController@data_pegawai');
Route::any('/hari_kerja', 'hrdController@showHarikerja');
Route::any('/v_hari_kerja', 'hrdController@showHarikerja_v');
Route::any('/save_harikerja', 'hrdController@save_harikerja');
Route::get('/edit_given_point','edit_given_pointController@showElement');
Route::get('/input_given_point','input_given_pointController@showAreaKinerja');


Route::any('/view_input_storing', 'storingController@view_input');
Route::any('/save_input_storing', 'storingController@save_storing');
Route::any('/rekap_storing', 'storingController@rekap_storing');


Route::any('/dashboard1', 'DashboardController@dashboard_storing');
Route::any('/data_dashboard1', 'DashboardController@data_dashboard_storing');
Route::any('/data_dashboard2', 'DashboardController@data_dashboard_storing2');
Route::any('/data_dashboard3', 'DashboardController@data_dashboard_storing3');

Route::any('/dashboard2', 'DashboardController@dashboard_sepeda');
Route::any('/data_sepeda', 'DashboardController@data_dashboard_sepeda');
Route::any('/data_stang', 'DashboardController@data_dashboard_stang');
Route::any('/data_penggerak', 'DashboardController@data_dashboard_penggerak');
Route::any('/data_ban_belakang', 'DashboardController@data_dashboard_ban_belakang');
Route::any('/data_ban_depan', 'DashboardController@data_dashboard_ban_depan');


	Route::get('/days_project','daysProjectController@showElement');
	Route::post('/days_project/input','daysProjectController@insert_project');
	Route::post('/mandays/search','daysProjectController@search_mandays');
	Route::post('/days_project/action','daysProjectController@action');
	Route::post('/days_project/getMandays','daysProjectController@getMandays');
	Route::get('/history/{project_id}/{last_status}','daysProjectController@history');
	Route::get('getjbtn','daysProjectController@getJabatan');
	Route::get('getInfoProjek','daysProjectController@getInfoProjek');

	Route::get('/newcase','newcaseController@showElement');
	Route::post('/newcase/search','newcaseController@getEmpPrjct');
	Route::post('/newcase/input','newcaseController@insert_Prjct');

	Route::get('/hrd','hrdController@showElement');
	Route::get('getEmployeeFromUnithrd','hrdController@getEmployeeFromUnit');
	Route::get('getEmployeeFromUnit1hrd','hrdController@getEmployeeFromUnit1');	
	Route::post('/hrd/search','hrdController@filter_hrd');
	Route::post('/hrd/input','hrdController@insert_hrd');	
	Route::post('/hrd/update','hrdController@update_hr_nilai');
	Route::post('/hrd/delete','holidayController@delete_holiday');
	Route::post('/update/target','hrdController@target');
  	Route::post('/givenpointhrd/input','input_given_pointController@inputAreaKinerjaHrd');
  	Route::post('/givenpointspv/input','input_given_pointController@inputAreaKinerjaSPV');
  	Route::post('/givenpointleader/input','input_given_pointController@inputAreaKinerjaLeader');

	Route::get('/spv','spvController@showElement');
	Route::get('/team_leader','team_leaderController@showElement');



	Route::get('/asman','asmanController@showElement');
	Route::get('getEmployeeFromUnitasman','asmanController@getEmployeeFromUnit');
	Route::get('getEmployeeFromUnit1asman','asmanController@getEmployeeFromUnit1');
	Route::post('/asman/search','asmanController@filter_asman');
	Route::post('/asman/input','asmanController@insert_asman');
	Route::post('/asman/update','asmanController@update_asman_nilai');
	Route::post('/asman/delete','holidayController@delete_asman');

	Route::get('/pmo','pmoController@showElement');
	Route::get('getEmployeeFromUnitpmo','pmoController@getEmployeeFromUnit');
	Route::get('getEmployeeFromUnit1pmo','pmoController@getEmployeeFromUnit1');
	Route::post('/pmo/search','pmoController@filter_pmo');
	Route::post('/pmo/input','pmoController@insert_pmo');	
	Route::post('/pmo/update','pmoController@update_pmo_nilai');

	Route::get('/pl','plController@showElement');
	Route::post('/pl/search','plController@filter_pl');
	Route::post('/pl/input','plController@insert_pl');

	Route::get('/input_emp','input_empController@showRoleUnit');
	Route::post('/input_emp/input','input_empController@insert_emp');
	
	Route::post('/integrasi/input','integrasiController@insert_emp');
	Route::get('/integrasi/update_data','integrasiController@update_data');
	Route::get('/integrasi/cek','integrasiController@cek_data');
	Route::get('/get/emp','integrasiController@getemp');
	Route::get('/integrasi','integrasiController@showRoleUnit'); 
	Route::get('/get/api','integrasiController@getapi');
	Route::get('/integrasi/updateAPI','integrasiController@updateAPI');

	Route::get('/view_emp','view_empController@showElement');
	Route::post('/view_emp/search','view_empController@filter_emp');

	Route::get('/index','indexController@showElement');
	Route::get('/index/dashkinerja','indexController1@showElement');
	Route::get('/index/yf','indexController@showElementyf');
	Route::get('/index/dashboard2','indexController@showElement2');
	Route::post('/indexphoto','indexController@photo');
	Route::get('getProjectFromYear','indexController@showProjectbyYear');
	Route::post('/index/GrafMnd','indexController@Graf_Mnd');
	Route::post('/index/GrafEmp','indexController@Graf_Emp');
	Route::post('/index/GrafEvo','indexController@Graf_Evo');	
	
	Route::get('/reportkpi','reportkpiController@showElement');
	Route::post('/reportkpi/search','reportkpiController@filter_report');
	Route::get('getEmployeeFromUnitreport','reportkpiController@getEmployeeFromUnit');
	
	Route::get('/days','daysController@showData');
	Route::post('/days/search','daysController@filter_days');
	Route::post('/days-emp/search','daysController@filter_days_emp');
	Route::get('getEmployeeFromUnit1','daysController@getEmployeeFromUnit');

	Route::any('/edit_employee','edit_employeeController@showRoleUnit');
	Route::any('/edit_employee/edit','edit_employeeController@edit_employee');
	Route::any('/for/unit','view_empController@forunit');
	Route::get('/graphic','indexController@showGraphic');
	Route::post('/searchGrap','indexController@searchGraphic');
	Route::get('/absensi','AbsensiController@showData');
	Route::get('/absen_harian','AbsensiController@absen_harian');
	Route::post('/absensi/search','AbsensiController@filter_absensi');
	Route::get('getEmployeeFromUnit','AbsensiController@getEmployeeFromUnit');
	Route::any('getlocation','AbsensiController@getlocation');
	Route::any('/target','globalController@kpi_target');
	Route::any('/saveinput','AbsensiController@saveinput_absen');

Route::any('/testcapture', 'AbsensiController@testcapture');

