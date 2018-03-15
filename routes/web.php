<?php

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

use App\Http\Controllers\sachController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/khachhang/ds', 'khachhangController@index');
Route::get('/nxb/add/{nxb_ma}/{nxb_ten}/{nxb_diaChi}', 'NhaxuatbanController@store');

////Khach hang route
//Route::group(['prefix'=>'management', function(){
//
//}]);

//Sach route
Route::get('/sach/kiemtra', 'sachController@checkExist_name');
Route::post('/sach/add', 'sachController@store');