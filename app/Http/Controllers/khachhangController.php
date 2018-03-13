<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class khachhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_khachhang = khachhang::all();
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
        $khachhang->kh_ma = $response->kh_ma;
        $khachhang->kh_taiKhoan = $response->kh_taiKhoan;
        $khachhang->kh_matKhau = $response->kh_matKhau;
        $khachhang->kh_hoTen = $response->kh_hoTen;
        $khachhang->kh_gioiTinh = $response->kh_gioiTinh;
        $khachhang->kh_email = $response->kh_email;
        $khachhang->kh_diaChi = $response->kh_diaChi;
        $khachhang->kh_soDienThoai = $response->kh_soDienThoai;
        $khachhang->save();

        return response(['error' => false, 'message' => $khachhang->toJon()], 200);
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
                            $khachhang -> toJon())
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
                            $khachhang-> toJon())
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
            $khachhang-> kh_ma = $response->kh_ma;
            $khachhang->kh_taiKhoan = $response->kh_taiKhoan;
            $khachhang->kh_matKhau = $response->kh_matKhau;
            $khachhang->kh_hoTen = $response->kh_hoTen;
            $khachhang->kh_gioiTinh = $response->kh_gioiTinh;
            $khachhang->kh_email = $response->kh_email;
            $khachhang->kh_diaChi = $response->kh_diaChi;
            $khachhang->kh_soDienThoai = $response->kh_soDienThoai;
            $khachhang->save();
            return response([
                    'error' => true.
                    'message'=> $khachhang->toJon()
            ], 200);
        } else{
            return response([
                    'error' => true.
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
                    'error' => true.
                    'message'=> "Khong tim thay khach hang [{$id}]"
            ], 200);
        }
    }
}
