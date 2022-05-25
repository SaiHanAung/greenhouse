<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Providers\ArtisanServiceProvider;
use App\Http\Controllers\DataController;
// use App\Http\Controllers\DashboardController;

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
Route::get('/test', function () {
    return view('test');
});
Route::get('/test2', function () {
    return view('test2');
});

Route::get('/qrcode', function () {
    return view('qrcode');
});

Route::get('switch/{id}');



Auth::routes();

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


Route::get('/setting', 'SettingController@index')->name('setting');

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::get('/traceability', function () {
    return view('traceability');
});
Route::get('/traceability/{datas}', 'TraceabilityController@index')->name('traceability.index');

// Route::resource('dashboards', DashboardController::class);

Route::resource('plots', PlotController::class);

Route::resource('autoruns', AutorunController::class);

Route::resource('switches', SwitchesController::class);

Route::resource('savenotes', SavenoteController::class);


Route::get('/plots/{datas}/savenote', 'SavenoteController@index')->name('savenote.index');

Route::get('/plots/{datas}/report', 'ReportController@index')->name('report.index');

Route::get('/plots/{datas}/qrcode', 'QrcodeController@index')->name('qrcode.index');

Route::get('/plots/{datas}/dashboard/info', 'DashboardController@index')->name('dashboard.index');
Route::get('/plots/{datas}/dashboard/autorun', 'AutorunController@index')->name('autorun.index');
Route::get('/plots/{datas}/dashboard/autorun/show', 'AutorunController@show')->name('autorun.show');
Route::get('/plots/{datas}/dashboard/switches', 'SwitchesController@index')->name('dashboard.switch');
Route::get('/plots/{datas}/dashboard/settime', 'DashboardController@settime')->name('dashboard.settime');

Route::get('/autoruns', 'AutorunController@index')->name('autorun');
Route::post('/autoruns.store', 'AutorunController@store')->name('autorun.store');
Route::delete('/autorun.destroy', 'AutorunController@destroy')->name('autorun.destroy');

Route::post('/switch.store', 'SwitchesController@store')->name('switch.store');
Route::delete('/switch.destroy/{switches}', 'SwitchesController@destroy')->name('switch.destroy');

Route::post('/traceability-factor.store', 'SaveNoteController@storeTraceabilityFactor')->name('savenote.storeTracFact');
Route::post('/traceability-use-factor.store', 'SaveNoteController@storeTraceabilityUseFactor')->name('savenote.storeTracUseFact');
Route::post('/traceability-harvest.store', 'SaveNoteController@storeTraceabilityHarvest')->name('savenote.storeTracHarv');
Route::post('/sell-produce.store', 'SaveNoteController@storeSellProduce')->name('savenote.storeSellProduce');

Route::delete('/traceability-factor.destroy/{traceability_factor}', 'SaveNoteController@destroyTracFact')->name('destroyTracFact');
Route::delete('/traceability-use-factor.destroy/{traceability_use_factor}', 'SaveNoteController@destroyTracUseFact')->name('destroyTracUseFact');
Route::delete('/traceability-harvest.destroy/{traceability_harvest}', 'SaveNoteController@destroyTracHarv')->name('destroyTracHarv');
Route::delete('/sell-produce.destroy/{sell_produce}', 'SaveNoteController@destroySellProduce')->name('destroySellProduce');


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    // return "Cache is cleared";
    return back();
});

Route::get('/downloadPDF/{datas}','QrcodeController@downloadPDF')->name('downloadPDF');

Route::get('/request-mqtt', 'DashboardController@reciveMqtt')->name('reciveMqtt');

Route::get('settime/{id}', 'DashboardController@st')->name('st');


Route::get('switch1/{id}', 'SwitchesController@da')->name('da');
Route::get('switch2/{id}', 'SwitchesController@da2')->name('da2');
Route::get('switch3/{id}', 'SwitchesController@da3')->name('da3');
Route::get('switch4/{id}', 'SwitchesController@da4')->name('da4');
Route::get('switch5/{id}', 'SwitchesController@da5')->name('da5');
Route::get('switch6/{id}', 'SwitchesController@da6')->name('da6');
Route::get('switch7/{id}', 'SwitchesController@da7')->name('da7');
Route::get('switch8/{id}', 'SwitchesController@da8')->name('da8');