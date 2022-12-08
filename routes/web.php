<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Providers\ArtisanServiceProvider;
use App\Http\Controllers\DataController;
// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\SavenoteController;

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
    return view('auth.login');
});

Route::get('/layout2', function() {
    return view('dashboard.layout2');
});
Route::get('/test', 'TestController@index')->name('test.index');
Route::delete('/test-softdelete/{id}', 'TestController@sd')->name('test.sd');
Route::get('/test-softdelete-show/{id}', 'TestController@sdShow')->name('test.sd.show');

Route::get('/test2', function () {
    return view('test2');
});

Route::get('/qrcode', function () {
    return view('qrcode');
});

Route::get('switch/{id}');

// Temp and Humid Chat //
Route::get('chart', 'ChartApiController@index')->name('api.chart');
Route::get('store-temp', 'ChartApiController@storeTemp')->name('storeTemp');
Route::get('showTemp-sixHour', 'ChartApiController@showTempSixHour')->name('showTempSixHour');
Route::get('dateShowTemp', 'ChartApiController@dateShowTemp')->name('dateShowTemp');
Route::get('dateShowHumid', 'ChartApiController@dateShowHumid')->name('dateShowHumid');
Route::get('store-humid', 'ChartApiController@storeHumid')->name('storeHumid');
//

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Route::get('/admin', function () { return view('admin.index'); })->name('admin.index');
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/view-user/{userID}', 'AdminController@viewUser')->name('admin.viewUser');
    Route::get('/admin/view-user/{userID}/edit-password', 'AdminController@editPassword')->name('admin.editPassword');
    Route::put('/admin.editUserPassword/{userID}', 'AdminController@editUserPassword')->name('admin.editUserPassword');
    Route::get('/admin/view-user/{userID}/view-plot/{plotID}', 'AdminController@viewPlot')->name('admin.viewPlot');
    Route::delete('/admin.destroyUser/{userID}', 'AdminController@destroyUser')->name('admin.destroyUser');
});


Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
 });

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('farms', FarmsController::class);
Route::get('/farms', 'FarmsController@index')->name('farms');
Route::get('/farms/info', 'FarmsController@info')->name('farmInfo');
Route::get('/farms/dashboard', 'FarmsController@dashboard')->name('farmDashboard');
Route::get('/farms/report', 'FarmsController@report')->name('farmReport');

// Route::get('/report', function(){ return view('report.index'); });


Route::get('/setting', 'SettingController@index')->name('setting');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile.update', 'ProfileController@update')->name('profile.update');

Route::get('/traceability', function () {
    return view('traceability');
});
// Route::get('/traceability/{plotID}/{id}', 'TraceabilityController@index')->name('traceability.index');
Route::get('/traceability/{plotID}/{reference_id}', 'TraceabilityController@index')->name('traceability.index');

// Route::resource('dashboards', DashboardController::class);

Route::resource('plots', PlotController::class);
Route::put('plot-update/{plotID}', 'PlotController@update')->name('plot-update');

Route::resource('autoruns', AutorunController::class);

Route::resource('switches', SwitchesController::class);


// Route::get('/plots/{plotID}/savenote', 'SavenoteController@index')->name('savenote.index');
Route::get('/plots/{plotID}/savenote', 'SaveNoteController@index')->name('savenote.index');

Route::get('/plots/{plotID}/report', 'ReportController@index')->name('report.index');

Route::get('/plots/{plotID}/qrcode', 'QrcodeController@index')->name('qrcode.index');

Route::get('/plots/{plotID}/setting', 'SettingController@index')->name('setting.index');

Route::get('/plots/{plotID}/dashboard/info', 'DashboardController@index')->name('dashboard.index');
Route::get('/plots/{plotID}/dashboard/autorun', 'AutorunController@index')->name('autorun.index');
Route::get('/plots/{plotID}/dashboard/autorun/show', 'AutorunController@show')->name('autorun.show');
Route::get('/plots/{plotID}/dashboard/switches', 'SwitchesController@index')->name('dashboard.switch');
Route::get('/plots/{plotID}/dashboard/settime', 'DashboardController@settime')->name('dashboard.settime');
Route::get('/plots/{plotID}/dashboard/history-plant/{historyPlantID}', 'DashboardController@historyPlant')->name('dashboard.historyPlant');
Route::delete('/new-plant/{plotID}', 'DashboardController@newPlant')->name('dashboard.newPlant');
Route::post('/storeSettingPlant', 'DashboardController@storeSettingPlant')->name('dashboard.storeSettingPlant');
Route::post('/store-traceability/{plotID}', 'DashboardController@storeTraceability')->name('dashboard.storeTraceability');

Route::get('/autoruns', 'AutorunController@index')->name('autorun');
Route::post('/autoruns.store', 'AutorunController@store')->name('autorun.store');
Route::delete('/autorun.destroy', 'AutorunController@destroy')->name('autorun.destroy');

Route::post('/switch.store', 'SwitchesController@store')->name('switch.store');
Route::post('/switch-time-set.store', 'SwitchesController@storeSwichTimeSet')->name('switchtTimeSet.store');
Route::delete('/switch.destroy/{switches}', 'SwitchesController@destroy')->name('switch.destroy');
Route::delete('/switch-time-set.destroy/{switch_time_set}', 'SwitchesController@destroySwichTimeSet')->name('destroySwichTimeSet');
Route::put('/switch-time-set.update/{switch_time_set}', 'SwitchesController@updateSwitchTimeSet')->name('updateSwitchTimeSet');

Route::post('/note-plant-area.store', 'SaveNoteController@storeNotePlantArea')->name('savenote.storeNotePlantArea');
Route::post('/note-plant.store', 'SaveNoteController@storeNotePlant')->name('savenote.storeNotePlant');
Route::post('/note-harvest.store', 'SaveNoteController@storeNoteHarvest')->name('savenote.storeNoteHarvest');
Route::post('/note-maintenance.store', 'SaveNoteController@storeNoteMaintenance')->name('savenote.storeNoteMaintenance');
Route::post('/note-sell.store', 'SaveNoteController@storeNoteSell')->name('savenote.storeNoteSell');

Route::delete('/note-plant-area.destroy/{note_plant_area}', 'SaveNoteController@destroyNotePlantArea')->name('destroyNotePlantArea');
Route::delete('/note-plant.destroy/{note_plant}', 'SaveNoteController@destroyNotePlant')->name('destroyNotePlant');
Route::delete('/note-harvest.destroy/{note_harvest}', 'SaveNoteController@destroyNoteHarvest')->name('destroyNoteHarvest');
Route::delete('/note-maintenance.destroy/{note_maintenance}', 'SaveNoteController@destroyNoteMaintenance')->name('destroyNoteMaintenance');
Route::delete('/note-sell.destroy/{note_sell}', 'SaveNoteController@destroyNoteSell')->name('destroyNoteSell');


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

//หาข้อมูลไม่เจอระบบจะแจ้ง หน้า error 404 อัตโนมัติ
Route::get('/test/{id}', function ($id) {
    return App\Plot::findOrFail($id);
});

Route::get('/downloadPDF/{plotID}','QrcodeController@downloadPDF')->name('downloadPDF');
Route::post('/settingQrcode/{plotID}','QrcodeController@settingQrcode')->name('settingQrcode');
Route::get('/downloadTracFactExcel','SaveNoteController@TracFactExcel')->name('TracFactExcel');
Route::get('/downloadTracUseFactExcel','SaveNoteController@TracUseFactExcel')->name('TracUseFactExcel');
Route::get('/downloadTracHarvExcel','SaveNoteController@TracHarvExcel')->name('TracHarvExcel');

Route::get('/request-mqtt', 'DashboardController@reciveMqtt')->name('reciveMqtt');

Route::get('settime/{id}', 'DashboardController@st')->name('st');


Route::get('switch1/{switchID}', 'SwitchesController@da')->name('da'); 
Route::get('switch-time-set-update/{switchID}', 'SwitchesController@switchTimeSetUpdate')->name('switchTimeSetUpdate');
Route::get('stop-time-set/{switchID}', 'SwitchesController@stopTimeSet')->name('stopTimeSet');