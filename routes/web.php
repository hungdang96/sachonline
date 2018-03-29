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
        Route::get('index', function () {return View('admin.chude');})->name('cd_index');
        Route::post('name/{value}', ['uses' => 'ChudeController@checkExistName'])->name('cd_checkName');
        Route::post('add', ['uses' => 'ChudeController@store'])->name('cd_add');
        Route::post('edit/{id}', ['uses' => 'ChudeController@edit'])->name('cd_edit');
        Route::post('update', ['uses' => 'ChudeController@update'])->name('cd_update');
        Route::get('delete/{id}', ['uses' => 'ChudeController@destroy'])->name('cd_del');
        Route::get('total', ['uses' => 'ChudeController@getTotal'])->name('cd_total');
        Route::get('range/{skip}/{take}', ['uses' => 'ChudeController@getRange'])->name('cd_range');
        Route::resource(
            'chude',
            'ChudeController',
            ['except' => ['create', 'edit']]
        );
    });

    /*Chủ đề khuyến mãi route - Điệp*/
    Route::group(['prefix' => 'chudekm'], function () {
        Route::get('index', function () {return View('admin.chudekhuyenmai');})->name('cdkm_index');
//        Route::post('value/{value}', ['uses' => 'ChudekhuyenmaiController@checkExistValue'])->name('cdkm_checkValue');
        Route::post('add', ['uses' => 'ChudekhuyenmaiController@store'])->name('cdkm_add');
        Route::post('edit/{id}', ['uses' => 'ChudekhuyenmaiController@edit'])->name('cdkm_edit');
        Route::post('update', ['uses' => 'ChudekhuyenmaiController@update'])->name('cdkm_update');
        Route::get('delete/{id}', ['uses' => 'ChudekhuyenmaiController@destroy'])->name('cdkm_del');
        Route::get('total', ['uses' => 'ChudekhuyenmaiController@getTotal'])->name('cdkm_total');
        Route::get('range/{skip}/{take}', ['uses' => 'ChudekhuyenmaiController@getRange'])->name('cdkm_range');
        Route::resource(
            'chudekhuyenmai',
            'ChudekhuyenmaiController',
            ['except' => ['create', 'edit']]
        );
    });
    /*Dịch giả route - Điệp*/
    Route::group(['prefix' => 'dichgia'], function () {
        Route::get('index', function () {return View('admin.dichgia');})->name('dg_index');
        Route::post('name/{value}', ['uses' => 'DichgiaController@checkExistName'])->name('dg_checkname');
        Route::post('add', ['uses' => 'DichgiaController@store'])->name('dg_add');
        Route::post('edit/{id}', ['uses' => 'DichgiaController@edit'])->name('dg_edit');
        Route::post('update', ['uses' => 'DichgiaController@update'])->name('dg_update');
        Route::get('delete/{id}', ['uses' => 'DichgiaController@destroy'])->name('dg_del');
        Route::get('total', ['uses' => 'DichgiaController@getTotal'])->name('dg_total');
        Route::get('range/{skip}/{take}', ['uses' => 'DichgiaController@getRange'])->name('dg_range');
        Route::resource(
            'dichgia',
            'DichgiaController',
            ['except' => ['create', 'edit']]
        );
    });
    /*Góp ý route - Điệp*/
    Route::group(['prefix' => 'gopy'], function () {
        Route::get('index', function () {return View('admin.gopy');})->name('gy_index');
//        Route::post('add', ['uses' => 'GopyController@store']);
        Route::post('delete/{id}', ['uses' => 'GopyController@destroy'])->name('gy_del');
        Route::get('total', ['uses' => 'GopyController@getTotal'])->name('gy_total');
        Route::get('range/{skip}/{take}', ['uses' => 'GopyController@getRange'])->name('gy_range');
        Route::resource(
            'gopy',
            'GopyController',
            ['except' => ['create', 'edit']]
        );
    });

    //Route nhà phát hành
    Route::group(['prefix' => 'nhaphathanh'], function (){
       Route::get('index', function (){View('admin.nhaphathanh');})->name('nph_index');
       Route::post('name/{value}', ['uses' => 'NhaphathanhController@checkExistName'])->name('nph_checkname');
       Route::post('add', ['uses' => 'NhaphathanhController@store'])->name('nph_add');
       Route::post('edit/{id}', ['uses' => 'NhaphathanhController@edit'])->name('nph_edit');
       Route::post('update', ['uses' => 'NhaphathanhController@update'])->name('nph_update');
       Route::get('delete/{id}', ['uses' => 'NhaphathanhController@destroy'])->name('nph_del');
       Route::get('total', ['uses' => 'NhaphathanhController@getTotal'])->name('nph_total');
       Route::get('range/{skip}/{take}', ['uses' => 'NhaphathanhController@getRange'])->name('nph_range');
       Route::resource(
           'Nhaphathanh',
           'NhaphathanhController',
           ['except' => ['create', 'edit']]
       );
    });

    //Route nhà xuất bản
    Route::group(['prefix' => 'nhaphathanh'], function (){
       Route::get('index', function (){View('admin.nhaxuatban');})->name('nxb_index');
       Route::post('name/{value}', ['uses' => 'NhaxuatbanController@checkExistName'])->name('nxb_checkname');
       Route::post('add', ['uses' => 'NhaxuatbanController@store'])->name('nxb_add');
       Route::post('edit/{id}', ['uses' => 'NhaxuatbanController@edit'])->name('nxb_edit');
       Route::post('update', ['uses' => 'NhaxuatbanController@update'])->name('nxb_update');
       Route::get('delete/{id}', ['uses' => 'NhaxuatbanController@destroy'])->name('nxb_del');
       Route::get('total', ['uses' => 'NhaxuatbanController@getTotal'])->name('nxb_total');
       Route::get('range/{skip}/{take}', ['uses' => 'NhaxuatbanController@getRange'])->name('nxb_range');
       Route::resource(
           'Nhaxuatban',
           'NhaxuatbanController',
           ['except' => ['create', 'edit']]
       );
    });

    //Route phiếu nhập
    Route::group(['prefix' => 'nhaphathanh'], function (){
       Route::get('index', function (){View('admin.phieunhap');})->name('pn_index');
       Route::post('checkmapn/{value}', ['uses' => 'phieunhapController@checkExistID'])->name('pn_checkname');
       Route::post('add', ['uses' => 'phieunhapController@store'])->name('pn_add');
       Route::post('edit/{id}', ['uses' => 'phieunhapController@edit'])->name('pn_edit');
       Route::post('update', ['uses' => 'phieunhapController@update'])->name('pn_update');
       Route::get('delete/{id}', ['uses' => 'phieunhapController@destroy'])->name('pn_del');
       Route::get('total', ['uses' => 'phieunhapController@getTotal'])->name('pn_total');
       Route::get('range/{skip}/{take}', ['uses' => 'phieunhapController@getRange'])->name('pn_range');
       Route::resource(
           'phieunhap',
           'phieunhapController',
           ['except' => ['create', 'edit']]
       );
    });

    //Route Quyền
    Route::group(['prefix' => 'quyenTableSeeder'], function () {
        Route::get('index', function () {return View('admin.quyenTableSeeder');})->name('q_index');
        Route::post('checkquyen/{value}', ['uses' => 'QuyenController@checkExistName'])->name('q_check');
        Route::post('add', ['uses' => 'QuyenController@store'])->name('q_add');
        Route::post('edit/{id}', ['uses' => 'QuyenController@edit'])->name('q_edit');
        Route::post('update', ['uses' => 'QuyenController@update'])->name('q_update');
        Route::post('delete/{id}', ['uses' => 'QuyenController@destroy'])->name('q_del');
        Route::get('total', ['uses' => 'QuyenController@getTotal'])->name('q_total');
        Route::get('range/{skip}/{take}', ['uses' => 'QuyenController@getRange'])->name('q_range');
        Route::resource(
            'quyenTableSeeder',
            'QuyenController',
            ['except' => ['create', 'edit']]
        );
    });

    //Route Sách
    Route::group(['prefix' => 'sach'], function () {
        Route::get('index', function () {return View('admin.sach');})->name('s_index');
        Route::post('checkSKU/{value}', ['uses' => 'sachController@checkExistSKU'])->name('sku_check');
        Route::post('add', ['uses' => 'sachController@store'])->name('s_add');
        Route::post('edit', ['uses' => 'sachController@edit'])->name('s_edit');
        Route::post('update', ['uses' => 'sachController@update'])->name('s_update');
        Route::post('delete/{id}', ['uses' => 'sachController@destroy'])->name('s_del');
        Route::get('total', ['uses' => 'sachController@getTotal'])->name('s_total');
        Route::get('range/{skip}/{take}', ['uses' => 'sachController@getRange'])->name('s_range');
        Route::resource(
            'sach',
            'sachController',
            ['except' => ['create', 'edit']]
        );
    });

    //Route Tác giả
    Route::group(['prefix'=> 'tacgia'], function (){
       Route::get('index', function (){ return View('admin.tacgia');})->name('tg_index');
       Route::post('checkname/{value}', ['uses'=>'tacgiaController@CheckExistName'])->name('tg_checkName');
       Route::post('add', ['uses' => 'tacgiaController@store'])->name('tg_add');
       Route::post('edit/{id}', ['uses' => 'tacgiaController@edit'])->name('tg_edit');
       Route::post('update', ['uses' => 'tacgiaController@update'])->name('tg_update');
       Route::post('delete/{id}', ['uses' => 'tacgiaController@destroy'])->name('tg_edit');
       Route::get('total', ['uses' => 'tacgiaController@getTotal'])->name('tg_total');
       Route::get('range/{skip}/{take}', ['uses' => 'tacgiaController@getRange'])->name('tg_range');
       Route::resource(
           'tacgia',
           'tacgiaController',
           ['expect'=>['create', 'edit']]);
    });

    //Route thanh toán
    Route::group(['prefix'=>'thanhtoan'],function (){
       Route::get('index', function (){return View('admin.thanhtoan');})->name('tt_index');
       Route::post('checkmatt/{value}', ['uses' => 'thanhtoanController@checkID'])->name('tt_checkMa');
       Route::post('add', ['uses' => 'thanhtoanController@store'])->name('tt_add');
       Route::post('delete/{id}', ['uses' => 'thanhtoanController@destroy'])->name('tt_del');
       Route::get('total', ['uses' => 'thanhtoanController@getTotal'])->name('tt_total');
       Route::get('range/{skip}/{take}', ['uses' => 'thanhtoanController@getRange'])->name('tt_range');
       Route::resource(
           'thanhtoan',
           'thanhtoanController',
           ['expect' => ['create','edit']]);
    });

    //Route thể loại
    Route::group(['prefix'=>'theloai'],function (){
       Route::get('index', function (){return View('admin.theloai');})->name('tl_index');
       Route::post('checkmatl/{value}', ['uses' => 'theloaiController@checkID'])->name('tl_checkma');
       Route::post('checktentl/{value}', ['uses' => 'theloaiController@checkName'])->name('tl_checkten');
       Route::post('add', ['uses' => 'theloaiController@store'])->name('tl_add');
       Route::post('edit/{id}', ['uses' => 'theloaiController@edit'])->name('tl_edit');
       Route::post('update', ['uses' => 'theloaiController@update'])->name('tl_update');
       Route::post('delete/{id}', ['uses' => 'theloaiController@destroy'])->name('tl_del');
       Route::get('total', ['uses' => 'theloaiController@getTotal'])->name('tl_total');
       Route::get('range/{skip}/{take}', ['uses' => 'theloaiController@getRange'])->name('tl_range');
       Route::resource(
           'theloai',
           'theloaiController',
           ['expect' => ['create','edit']]);
    });
});

/* LƯU Ý: Nguy hiểm cho hệ thống - CẤM XÓA DƯỚI MỌI HÌNH THỨC!*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
