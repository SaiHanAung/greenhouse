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

Route::get('/qrcode', function () {
    return view('qrcode');
});

Route::get('/traceability', function () {
    return view('traceability');
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('farms', FarmsController::class);
Route::get('/farms', 'FarmsController@index')->name('farms');
Route::get('/farms/info', 'FarmsController@info')->name('farmInfo');
Route::get('/farms/dashboard', 'FarmsController@dashboard')->name('farmDashboard');
Route::get('/farms/report', 'FarmsController@report')->name('farmReport');


Route::get('/setting', 'SettingController@index')->name('setting');


Route::get('/profile', 'ProfileController@index')->name('profile');


Route::resource('dashboard', DashboardController::class);

Route::resource('plots', PlotController::class);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// ================== QR-Code Genarator =====================
// Route::get('/', [DataController::class, 'index']);
// Route::post('/', [DataController::class, 'store'])->name('store');
// Route::get('qrcode/{id}', [DataController::class, 'generate'])->name('generate');



Route::get('dashboard1/{id}', 'DashboardController@da')->name('da');
Route::get('dashboard2/{id}', 'DashboardController@da2')->name('da2');
Route::get('dashboard3/{id}', 'DashboardController@da3')->name('da3');
Route::get('dashboard4/{id}', 'DashboardController@da4')->name('da4');
Route::get('dashboard5/{id}', 'DashboardController@da5')->name('da5');
Route::get('dashboard6/{id}', 'DashboardController@da6')->name('da6');
Route::get('dashboard7/{id}', 'DashboardController@da7')->name('da7');
Route::get('dashboard8/{id}', 'DashboardController@da8')->name('da8');