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
use Illuminate\Support\Facades\Route;

//use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});



//Route::get('/khachhang/ds','khachhangController@index');
//Route::get('/khachhang/view','khachhangController@returnView');
//Route::get('/khachhang/random','khachhangController@returnKH');
Route::group(['prefix'=>'administrator'], function () {
    /*Chủ đề route - Điệp*/
    Route::group(['prefix' => 'chude'], function () {
    });

    /*Chủ đề khuyến mãi route - Điệp*/
    Route::group(['prefix' => 'chudekm'], function () {
    });
    /*Dịch giả route - Điệp*/
    Route::group(['prefix' => 'dichgia'], function () {

    });
    /*Góp ý route - Điệp*/
    Route::group(['prefix' => 'gopy'], function () {

    });

    //Route nhà phát hành
    Route::group(['prefix' => 'nhaphathanh'], function (){

    });

    //Route nhà xuất bản
    Route::group(['prefix' => 'nhaphathanh'], function (){

    });

    //Route phiếu nhập
    Route::group(['prefix' => 'nhaphathanh'], function (){

    });

    //Route Quyền
    Route::group(['prefix' => 'quyen'], function () {

    });

    //Route Sách
    Route::group(['prefix' => 'sach'], function () {

    });

    //Route Tác giả
    Route::group(['prefix'=> 'tacgia'], function (){

    });

    //Route thanh toán
    Route::group(['prefix'=>'thanhtoan'],function (){

    });

    //Route thể loại
    Route::group(['prefix'=>'theloai'],function (){

    });
});

/* LƯU Ý: Nguy hiểm cho hệ thống - CẤM XÓA DƯỚI MỌI HÌNH THỨC!*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
