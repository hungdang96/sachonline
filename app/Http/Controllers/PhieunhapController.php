<?php

namespace App\Http\Controllers;

use App\phieunhap;
use function compact;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function json_encode;
use PDOException;

class phieunhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_phieunhap = phieunhap::all();
        $json = json_encode($ds_phieunhap);
        return response(['error'=>false,'message'=>compact('ds_phieunhap','json')],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phieunhap = new phieunhap();
        $phieunhap->pn_ma = $request->pn_ma;
        $phieunhap->pn_nguoiGiao = $request->pn_nguoiGiao;
        $phieunhap->pn_soHoaDon = $request->pn_soHoaDon;
        $phieunhap->pn_ngayXuatHoaDon = $request->pn_ngayXuatHoaDon;
        $phieunhap->pn_nguoiLapPhieu = $request->pn_nguoiLapPhieu;
        $phieunhap->pn_ngayNhapPhieu = $request->pn_ngayNhapPhieu;
        $phieunhap->nv_keToan = $request->nv_keToan;
        $phieunhap->pn_ngayXacNhan = $request->pn_ngayXacNhan;
        $phieunhap->nv_thuKho = $request->nv_thuKho;
        $phieunhap->pn_ngayNhapKho = $request->pn_ngayNhapKho;
        $phieunhap->pn_trangThai = $request->pn_trangThai;
        $phieunhap->nph_maFK = $request->nph_maFK;
        $phieunhap->save();

        return response(['error'=>false,'message'=>$phieunhap->toJson()],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phieunhap = phieunhap::where('pn_ma',$id)->first();
        $result = ['error'=> $phieunhap == null,
                    'message'=>($phieunhap == null?"Không tìm thấy phiếu nhập phieunhap[{$id}]":$phieunhap->toJson())];
        return View('welcome',['result'=>$result]);

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
        $phieunhap = phieunhap::where('pn_ma',$id)->first();
        if($phieunhap){
            $phieunhap->pn_nguoiGiao = $request->pn_nguoiGiao;
            $phieunhap->pn_soHoaDon = $request->pn_soHoaDon;
            $phieunhap->pn_ngayXuatHoaDon = $request->pn_ngayXuatHoaDon;
            $phieunhap->pn_nguoiLapPhieu = $request->pn_nguoiLapPhieu;
            $phieunhap->pn_ngayNhapPhieu = $request->pn_ngayNhapPhieu;
            $phieunhap->nv_keToan = $request->nv_keToan;
            $phieunhap->pn_ngayXacNhan = $request->pn_ngayXacNhan;
            $phieunhap->nv_thuKho = $request->nv_thuKho;
            $phieunhap->pn_ngayNhapKho = $request->pn_ngayNhapKho;
            $phieunhap->pn_trangThai = $request->pn_trangThai;
            $phieunhap->nph_maFK = $request->nph_maFK;
            $phieunhap->save();

            return response(['error'=>false,'message'=>$phieunhap->toJson()],200);
        }else{
            return response(['error'=> true, 'message'=>"Không tìm thấy phiếu nhập phieunhap[{$id}]"],200);
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
        $phieunhap = phieunhap::where('pn_ma',$id)->first();
        if($phieunhap){
            $phieunhap->delete();
            return response(['error'=>false,'message' => "Đã xóa phieunhap[{$id}]"],200);
        }else{
            return response(['error'=>true,'message'=>"Không tìm thấy phiếu nhập phieunhap[{$id}]"],200);
        }
    }

    public function checkExistID($value){
        try{
            $id_check = phieunhap::where('pn_ma',$value)->first();
            return response(['error'=>false,
                'message'=>$id_check!=null?"true":"false"],200);
        }
        catch (QueryException $e){
            return response(['error'=>true,
                'message'=> $e->getMessage()], 200);
        }
        catch (PDOException $e){
            return response(['error'=>true,
                'message'=>$e->getMessage()],200);
        }
    }
}
