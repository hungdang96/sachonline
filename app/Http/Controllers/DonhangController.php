<?php

namespace App\Http\Controllers;
use App\donhang;
use Illuminate\Http\Request;

class donhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_donhang = donhang::all();
        $json = json_encode($ds_donhang);
        return response([
                'error' => false, 'message' => compact('ds_donhang', 'json')],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.donhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donhang = new donhang();
        $donhang->dh_ma = $request->dh_ma;
        $donhang->dh_thoiGianDatHang = $request->dh_thoiGianDatHang;
        $donhang->dh_thoiGianNhanHang = $request->dh_thoiGianNhanHang;
        $donhang->dh_nguoiNhan = $request->dh_nguoiNhan;
        $donhang->dh_diaChi = $request->dh_diaChi;
        $donhang->dh_dienThoai = $request->dh_dienThoai;
        $donhang->dh_nguoiGui = $request->dh_nguoiGui;
        $donhang->dh_daThanhToan = $request->dh_daThanhToan;
        $donhang->dh_ngayXuLy = $request->dh_ngayXuLy;
        $donhang->dh_ngayLapPhieuGiao = $request->dh_ngayLapPhieuGiao;
        $donhang->dh_ngayGiaoHang = $request->dh_ngayGiaoHang;
        $donhang->dh_trangThai = $request->dh_trangThai;
        $donhang->vc_maFK = $request->vc_maFK;
        $donhang->tt_maFK = $request->tt_maFK;
        $donhang->save();
        return response(['error' => false, 'message' => $donhang->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donhang= donhang::where("dh_ma", $id)->first();
        return response([
                'error' => $donhang == null,
                'message' => ($donhang == null?
                            "Không tìm thấy donhang[{$id}]":
                            $donhang->toJson())
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
        $donhang = donhang::where("dh_ma", $id)->first();
        $result = [
            'error' => $donhang == null,
            'message' => ($donhang == null?
                "Không tìm thấy donhang[{$id}]":
                $donhang->toJson())
        ];
        return View('cusc_qt.donhang.edit', ['result' => $result]);
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
        $donhang = donhang::where("dh_ma", $id)
                            ->first();
        if ($donhang) {
            $donhang->dh_ma = $request->dh_ma;
            $donhang->dh_thoiGianDatHang = $request->dh_thoiGianDatHang;
            $donhang->dh_thoiGianNhanHang = $request->dh_thoiGianNhanHang;
            $donhang->dh_nguoiNhan = $request->dh_nguoiNhan;
            $donhang->dh_diaChi = $request->dh_diaChi;
            $donhang->dh_dienThoai = $request->dh_dienThoai;
            $donhang->dh_nguoiGui = $request->dh_nguoiGui;
            $donhang->dh_daThanhToan = $request->dh_daThanhToan;
            $donhang->dh_ngayXuLy = $request->dh_ngayXuLy;
            $donhang->dh_ngayLapPhieuGiao = $request->dh_ngayLapPhieuGiao;
            $donhang->dh_ngayGiaoHang = $request->dh_ngayGiaoHang;
            $donhang->dh_trangThai = $request->dh_trangThai;
            $donhang->vc_maFK = $request->vc_maFK;
            $donhang->tt_maFK = $request->tt_maFK;
            $donhang->save();
            return response([
                    'error' => false,
                    'message' => $donhang->toJson()
                ], 200);
        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy donhang[{$id}]"
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
        $donhang = donhang::where("dh_ma", $id)->first();
        if($donhang) {
            $donhang->delete();
            return response([
                    'error' => false,
                    'message' => "Xóa donhang[{$id}] thành công"], 200);

        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy donhang[{$id}]"
                ], 200);
        }
    }
}
