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

/*Chủ đề route - Điệp*/
Route::group(['prefix'=>'administrator'],function(){
   //Danh sách các route bên trong (vd: khachhang\sach\chude\nhaxuatban\...)
});

/*Chủ đề khuyến mãi route - Điệp*/
Route::group(['prefix'=>'administrator'], function (){

});
/*Dịch giả route - Điệp*/
Route::group(['prefix'=>'administrator'], function (){

});
/*Góp ý route - Điệp*/
Route::group(['prefix'=>'administrator'], function (){

});
/*Khách hàng route - Hùng*/
Route::group(['prefix'=>'administrator'], function (){
    Route::get('khachhang/index', function (){return View('admin.khachhang');});
    Route::get('khachhang/account/{value}', ['uses' => 'khachhangController@checkExistAccount']);
    Route::get('khachhang/email/{value}', ['uses' => 'khachhangController@checkExistEmail']);
    Route::get('khachhang/phone/{value}', ['uses' => 'khachhangController@checkExistPhone']);
    Route::post('khachhang/add', ['uses' => 'khachhangController@checkExistPhone']);
    Route::get('khachhang/delete/{id}', ['uses' => 'khachhangController@destroy']);
    Route::get('khachhang/total', ['uses' => 'khachhangController@getTotal']);
    Route::get('khachhang/range/{skip}/{take}', ['uses' => 'khachhangController@getRange']);
    Route::resource(
        'khachhang',
        'khachhangController',
        ['except'=>['create','edit']]
    );
});
/*Khuyến mãi route - Hùng*/
Route::group(['prefix'=>'administrator'], function (){
    Route::get('khuyenmai/index', function (){return View('admin.khuyenmai');});
    Route::get('khuyenmai/name/{value}', ['uses' => 'KhuyenmaiController@checkExistName']);
    Route::get('khuyenmai/delete/{id}', ['uses' => 'KhuyenmaiController@destroy']);
    Route::get('khuyenmai/total', ['uses' => 'KhuyenmaiController@getTotal']);
    Route::get('khuyenmai/range/{skip}/{take}', ['uses' => 'KhuyenmaiController@getRange']);
    Route::resource(
        'khuyenmai',
        'KhuyenmaiController',
        ['except'=>['create','edit']]
    );
});
/*Ngôn ngữ route - Hùng*/
Route::group(['prefix'=>'administrator'], function (){
    Route::get('ngonngu/index', function (){return View('admin.ngonngu');});
    Route::get('ngonngu/name/{value}', ['uses' => 'NgonnguController@checkExistName']);
    Route::get('ngonngu/delete/{id}', ['uses' => 'NgonnguController@destroy']);
    Route::get('ngonngu/total', ['uses' => 'NgonnguController@getTotal']);
    Route::get('ngonngu/range/{skip}/{take}', ['uses'=>'NgonnguController@getRange']);
    Route::resource(
        'ngonngu',
        'NgonnguController',
        ['except'=>['create','edit']]
    );
});
/*Nhân viên route - Hùng*/
Route::group(['prefix'=>'administrator'], function (){
    Route::get('nhanvien/index', function (){return View('admin.nhanvien');});
    Route::get('nhanvien/account/{value}', ['uses'=>'NhanvienController@checkExistAccount']);
    Route::get('nhanvien/email/{value}', ['uses'=>'NhanvienController@checkExistEmail']);
    Route::get('nhanvien/phone/{value}', ['uses'=>'NhanvienController@checkExistPhone']);
    Route::get('nhanvien/delete/{id}', ['uses' => 'NhanvienController@destroy']);
    Route::get('nhanvien/total', ['uses' => 'NhanvienController@getTotal']);
    Route::get('nhanvien/range/{skip}/{take}', ['uses' => 'NhanvienController@getRange']);
    Route::resource(
        'nhanvien',
        'NhanvienController',
        ['except'=>['create','edit']]
    );
});
/*Nhà phát hành route - Hùng*/
Route::group(['prefix'=>'administrator'], function (){

});
/*Nhà xuất bản route - Hùng*/
Route::group(['prefix'=>'administrator'], function (){

});
/*Quyền route - Phúc*/
Route::group(['prefix'=>'administrator'], function (){

});
/*Sách route - Phúc*/
Route::group(['prefix'=>'administrator'], function (){

});
/*Tác giả route - Phúc*/
Route::group(['prefix'=>'administrator'], function (){

});
/*Thể loại route - Phúc*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
