<?php

namespace App\Http\Controllers;
use app\khuyenmai;
use Illuminate\Http\Request;

class khuyenmaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_khuyenmai = khuyenmai::all();
        $json = json_encode($ds_khuyenmai);
        return response(['error' => false, 'message' => compact('ds_khuyenmai', 'json')], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.khuyenmai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $khuyenmai = new khuyenmai();
        $khuyenmai->km_ma = $request->km_ma;
        $khuyenmai->km_ten = $request->km_ten;
        $khuyenmai->km_noiDung = $request->km_noiDung;
        $khuyenmai->km_batDau = $request->km_batDau;
        $khuyenmai->km_ketThuc = $request->km_ketThuc;
        $khuyenmai->km_giaiTri = $request->km_giaiTri;
        $khuyenmai->nv_nguoiLap = $request->nv_nguoiLap;
        $khuyenmai->km_ngayLap = $request->km_ngayLap;
        $khuyenmai->nv_kyNhay = $request->nv_kyNhay;
        $khuyenmai->km_ngayKyNhay = $request->km_ngayKyNhay;
        $khuyenmai->nv_kyDuyet = $request->nv_kyDuyet;
        $khuyenmai->km_ngayDuyet = $request->km_ngayDuyet;
        $khuyenmai->save();
        return response(['error' => false, 'message' => $khuyenmai->toJson()], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $khuyenmai = khuyenmai::where("km_ma", $id)->first();
        return response([
            'error' => $khuyenmai == null,
            'message' => ($khuyenmai == null?
                            "Khong tim thay khuyen mai [{$id}]":
                            $khuyenmai -> toJson())
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
        $khuyenmai = khuyenmai::where("km_ma", $id)->first();
        $result = [
            'error' => $khuyenmai == null,
            'message' => ($khuyenmai == null?
                            "Khong tim thay khuyen mai [{$id}]":
                            $khuyenmai-> toJson())
        ];

        return View('cusc_qt.khuyenmai.edit', ['result' => $result]);
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
        $khuyenmai = khuyenmai::where("km_ma", $id)->first();
        if ($khuyenmai){
            $khuyenmai->km_ma = $request->km_ma;
            $khuyenmai->km_ten = $request->km_ten;
            $khuyenmai->km_noiDung = $request->km_noiDung;
            $khuyenmai->km_batDau = $request->km_batDau;
            $khuyenmai->km_ketThuc = $request->km_ketThuc;
            $khuyenmai->km_giaiTri = $request->km_giaiTri;
            $khuyenmai->nv_nguoiLap = $request->nv_nguoiLap;
            $khuyenmai->km_ngayLap = $request->km_ngayLap;
            $khuyenmai->nv_kyNhay = $request->nv_kyNhay;
            $khuyenmai->km_ngayKyNhay = $request->km_ngayKyNhay;
            $khuyenmai->nv_kyDuyet = $request->nv_kyDuyet;
            $khuyenmai->km_ngayDuyet = $request->km_ngayDuyet;
            $khuyenmai->save();
            return response([
                    'error' => true.
                    'message'=> $khuyenmai->toJson()
            ], 200);
        } else{
            return response([
                    'error' => true.
                    'message'=> "Khong tim thay khuyen mai [{$id}]"
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
        $khuyenmai = khuyenmai::where("km_ma", $id)->first();
        if ($khuyenmai){
            $khuyenmai->delete();
            return response([
                    'error' => false,
                    'message' => "Xoa khuyen mai [{$id}] thanh cong"
                ], 200);
        } else{
            return response([
                    'error' => true.
                    'message'=> "Khong tim thay khuyen mai [{$id}]"
            ], 200);
        }
    }
}
