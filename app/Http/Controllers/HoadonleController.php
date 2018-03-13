<?php

namespace App\Http\Controllers;
use App\hoadonle;
use Illuminate\Http\Request;

class hoadonleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_hoadonle = hoadonle::all();
        $json = json_encode($ds_hoadonle);
        return response(['error' => false, 'message' => compact('ds_hoadonle', 'json')], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.hoadonle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hoadonle = new hoadonle();
        $hoadonle->hdl_ma = $request->hdl_ma;
        $hoadonle->hdl_nguoiMuaHang = $request->hdl_nguoiMuaHang;
        $hoadonle->hdl_dienThoai = $request->hdl_dienThoai;
        $hoadonle->hdl_diaChi = $request->hdl_diaChi;
        $hoadonle->nv_lapHoaDon = $request->nv_lapHoaDon;
        $hoadonle->save();

        return response(['error' => false, 'message' => $hoadonle->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hoadonle = hoadonle::where("hdl_ma", $id)->first();
        return response([
            'error' => $hoadonle == null,
            'message' => ($hoadonle == null?
                            "Khong tim thay hoa don le [{$id}]":
                            $hoadonle -> toJson())
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
        $hoadonle = hoadonle::where("hdl_ma", $id)->first();
        $result = [
            'error' => $hoadonle == null,
            'message' => ($hoadonle == null?
                            "Khong tim thay hoa don le [{$id}]":
                            $hoadonle-> toJson())
        ];

        return View('cusc_qt.hoadonle.edit', ['result' => $result]);
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
        $hoadonle = hoadonle::where("hdl_ma", $id)->first();
        if ($hoadonle){
            $hoadonle->hdl_ma = $request->hdl_ma;
            $hoadonle->hdl_nguoiMuaHang = $request->hdl_nguoiMuaHang;
            $hoadonle->hdl_dienThoai = $request->hdl_dienThoai;
            $hoadonle->hdl_diaChi = $request->hdl_diaChi;
            $hoadonle->nv_lapHoaDon = $request->nv_lapHoaDon;
            $hoadonle->hdl_ngayXuatHoaDon = $request->hdl_ngayXuatHoaDon;
            $hoadonle->save();

            return response([
                    'error' => true,
                    'message'=> $hoadonle->toJson()
            ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay hoa don le [{$id}]"
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
        $hoadonle = hoadonle::where("hdl_ma", $id)->first();
        if ($hoadonle){
            $hoadonle->delete();
            return response([
                    'error' => false,
                    'message' => "Xoa hoa don le [{$id}] thanh cong"
                ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay hoa don le [{$id}]"
            ], 200);
        }
    }
}
