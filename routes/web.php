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
        //Danh sách các route bên trong (vd: khachhang\sach\chude\nhaxuatban\...)
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
    /*Khách hàng route - Hùng*/
    Route::group(['prefix' => 'khachhang'], function () {
        Route::get('index', function () {return View('admin.khachhang');});
        Route::get('account/{value}', ['uses' => 'khachhangController@checkExistAccount']);
        Route::get('mail/{value}', ['uses' => 'khachhangController@checkExistEmail']);
        Route::get('phone/{value}', ['uses' => 'khachhangController@checkExistPhone']);
        Route::post('add', ['uses' => 'khachhangController@store']);
        Route::get('delete/{id}', ['uses' => 'khachhangController@destroy']);
        Route::get('total', ['uses' => 'khachhangController@getTotal']);
        Route::get('range/{skip}/{take}', ['uses' => 'khachhangController@getRange']);
        Route::resource(
            'khachhang',
            'khachhangController',
            ['except' => ['create', 'edit']]
        );
    });
    /*Khuyến mãi route - Hùng*/
    Route::group(['prefix' => 'khuyenmai'], function () {
        Route::get('index', function () {return View('admin.khuyenmai');});
        Route::get('name/{value}', ['uses' => 'KhuyenmaiController@checkExistName']);
        Route::get('delete/{id}', ['uses' => 'KhuyenmaiController@destroy']);
        Route::get('total', ['uses' => 'KhuyenmaiController@getTotal']);
        Route::get('range/{skip}/{take}', ['uses' => 'KhuyenmaiController@getRange']);
        Route::resource(
            'khuyenmai',
            'KhuyenmaiController',
            ['except' => ['create', 'edit']]
        );
    });
    /*Ngôn ngữ route - Hùng*/
    Route::group(['prefix' => 'ngonngu'], function () {
        Route::get('index', function () {return View('admin.ngonngu');});
        Route::get('name/{value}', ['uses' => 'NgonnguController@checkExistName']);
        Route::get('delete/{id}', ['uses' => 'NgonnguController@destroy']);
        Route::get('total', ['uses' => 'NgonnguController@getTotal']);
        Route::get('range/{skip}/{take}', ['uses' => 'NgonnguController@getRange']);
        Route::resource(
            'ngonngu',
            'NgonnguController',
            ['except' => ['create', 'edit']]
        );
    });
    /*Nhân viên route - Hùng*/
    Route::group(['prefix' => 'nhanvien'], function () {
        Route::get('index', function () {return View('admin.nhanvien');});
        Route::get('account/{value}', ['uses' => 'NhanvienController@checkExistAccount']);
        Route::get('email/{value}', ['uses' => 'NhanvienController@checkExistEmail']);
        Route::get('phone/{value}', ['uses' => 'NhanvienController@checkExistPhone']);
        Route::get('delete/{id}', ['uses' => 'NhanvienController@destroy']);
        Route::get('total', ['uses' => 'NhanvienController@getTotal']);
        Route::get('range/{skip}/{take}', ['uses' => 'NhanvienController@getRange']);
        Route::resource(
            'nhanvien',
            'NhanvienController',
            ['except' => ['create', 'edit']]
        );
    });
    /*Nhà phát hành route - Hùng*/
    Route::group(['prefix' => 'nhaphathanh'], function () {
        Route::get('index', function () {return View('admin.nhaphathanh');});
        Route::get('name/{value}', ['uses' => 'NhaphathanhController@checkExistName']);
        Route::get('email/{value}', ['uses' => 'NhaphathanhController@checkExistEmail']);
        Route::get('phone/{value}', ['uses' => 'NhaphathanhController@checkExistPhone']);
        Route::get('delete/{id}', ['uses' => 'NhaphathanhController@destroy']);
        Route::get('total', ['uses' => 'NhaphathanhController@getTotal']);
        Route::get('range/{skip}/{take}', ['uses' => 'NhaphathanhController@getRange']);
        Route::resource(
            'nhaphathanh',
            'NhaphathanhController',
            ['except' => ['create', 'edit']]
        );
    });
    /*Nhà xuất bản route - Hùng*/
    Route::group(['prefix' => 'nhaxuatban'], function () {
        Route::get('index', function () {return View('admin.nhanvien');});
        Route::get('name/{value}', ['uses' => 'NhaxuatbanController@checkExistName']);
        Route::get('delete/{id}', ['uses' => 'NhaxuatbanController@destroy']);
        Route::get('total', ['uses' => 'NhaxuatbanController@getTotal']);
        Route::get('range/{skip}/{take}', ['uses' => 'NhaxuatbanController@getRange']);
        Route::resource(
            'nhaxuatban',
            'NhaxuatbanController',
            ['except' => ['create', 'edit']]
        );
    });
    /*Quyền route - Phúc*/
    Route::group(['prefix' => 'quyen'], function () {

    });
    /*Sách route - Phúc*/
    Route::group(['prefix' => 'sach'], function () {

    });
    /*Tác giả route - Phúc*/
    Route::group(['prefix' => 'tacgia'], function () {

    });
    /*Thể loại route - Phúc*/
    Route::group(['prefix' => 'theloai'], function () {

    });
});

/* LƯU Ý: Nguy hiểm cho hệ thống - CẤM XÓA DƯỚI MỌI HÌNH THỨC!*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
