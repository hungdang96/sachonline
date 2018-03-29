<?php

namespace App\Http\Controllers;

use App\khachhang;
use function compact;
use Illuminate\Http\Request;
use Illuminate\View\View;

class khachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_khachhang=khachhang::all();
        $json = json_encode($ds_khachhang);
        return response(['error' => false, 'message' => compact('ds_khachhang', 'json')], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.khachhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $khachhang = new khachhang();
        $khachhang->kh_ma = $request->kh_ma;
        $khachhang->kh_taiKhoan = $request->kh_taiKhoan;
        $khachhang->kh_matKhau = $request->kh_matKhau;
        $khachhang->kh_hoTen = $request->kh_hoTen;
        $khachhang->kh_gioiTinh = $request->kh_gioiTinh;
        $khachhang->kh_email = $request->kh_email;
        $khachhang->kh_diaChi = $request->kh_diaChi;
        $khachhang->kh_soDienThoai = $request->kh_soDienThoai;
        $khachhang->save();

        return response(['error' => false, 'message' => $khachhang->toJson()], 200);
//        return ['status'=>true, 'data'=>$khachhang];
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $khachhang = khachhang::where("kh_ma", $id)->first();
        return response([
            'error' => $khachhang == null,
            'message' => ($khachhang == null?
                            "Khong tim thay khach hang [{$id}]":
                            $khachhang -> toJson())
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khachhang = khachhang::where("kh_ma", $id)->first();
        $result = [
            'error' => $khachhang == null,
            'message' => ($khachhang == null?
                            "Khong tim thay khach hang [{$id}]":
                            $khachhang-> toJson())
        ];

        return View('cusc_qt.khachhang.edit', ['result' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $khachhang = khachhang::where("kh_ma", $id)->first();
        if ($khachhang){
            $khachhang-> kh_ma = $request->kh_ma;
            $khachhang->kh_taiKhoan = $request->kh_taiKhoan;
            $khachhang->kh_matKhau = $request->kh_matKhau;
            $khachhang->kh_hoTen = $request->kh_hoTen;
            $khachhang->kh_gioiTinh = $request->kh_gioiTinh;
            $khachhang->kh_email = $request->kh_email;
            $khachhang->kh_ngaySinh = $request->kh_ngaySinh;
            $khachhang->kh_diaChi = $request->kh_diaChi;
            $khachhang->kh_soDienThoai = $request->kh_soDienThoai;
            $khachhang->kh_trangThai = $request->kh_trangThai;
            $khachhang->save();
            return response([
                    'error' => true,
                    'message'=> $khachhang->toJson()
            ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay khach hang [{$id}]"
            ], 200);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khachhang = khachhang::where("kh_ma", $id)->first();
        if ($khachhang){
            $khachhang->delete();
            return response([
                    'error' => false,
                    'message' => "Xoa khach hang [{$id}] thanh cong"
                ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay khach hang [{$id}]"
            ], 200);
        }
    }

//    public function returnView()
//    {
//        return View('hello')->with(['hoten'=>'Đặng Thanh Hùng',
//                                        'email'=> 'abc@test.com',
//                                        'phone'=> '0123456xxx']);
//    }
//
//    public function returnKH(){
//        $kh = khachhang::paginate(10);
//        return View('hello', compact('kh'));
//    }

}
