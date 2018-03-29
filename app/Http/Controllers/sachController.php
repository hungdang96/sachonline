<?php

namespace App\Http\Controllers;

use App\sach;
use function compact;
use function file_get_contents;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function json_encode;
use PDOException;
use function response;

class sachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_sach = sach::all();
        $json = json_encode($ds_sach);
        return response(['error'=>false,'message'=>compact('ds_sach','json')],200);
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
        $sach = new sach();
        $sach->s_sku = $request->s_sku;
        $sach->s_ten = $request->s_ten;
        $sach->s_giaGoc = $request->s_giaGoc;
        $sach->s_giaBan = $request->s_giaBan;
        $sach->s_soTrang = $request->s_soTrang;
        $sach->s_namXuatBan = $request->s_namXuatBan;
        $sach->s_kichThuoc = $request->s_kichThuoc;
        $sach->s_danhGia = $request->s_danhGia;
        $sach->s_loaiBia = $request->s_loaiBia;
        $sach->s_trangThai = $request->s_trangThai;
        $sach->s_gioiThieu = $request->s_gioiThieu;
        $sach->nxb_maFK = $request->nxb_ma;
        $sach->tl_maFK = $request->tl_ma;
        $sach->nn_maFK = $request->nn_ma;
        $sach->save();

        return response(['error'=>false,'message'=>$sach->toJson()],200);
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
        $sach = sach::where('s_sku',$id)->first();
        $result = ['error'=>$sach==null,
                    'message'=>($sach==null?"Không tìm thấy sách sach[{$id}]":$sach->toJson())];
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
        $sach = sach::where('s_sku',$id)->first();
        if($sach){
            $sach->s_sku = $request->s_sku;
            $sach->s_ten = $request->s_ten;
            $sach->s_giaGoc = $request->s_giaGoc;
            $sach->s_giaBan = $request->s_giaBan;
            $sach->s_soTrang = $request->s_soTrang;
            $sach->s_namXuatBan = $request->s_namXuatBan;
            $sach->s_kichThuoc = $request->s_kichThuoc;
            $sach->s_danhGia = $request->s_danhGia;
            $sach->s_loaiBia = $request->s_loaiBia;
            $sach->s_trangThai = $request->s_trangThai;
            $sach->s_gioiThieu = $request->s_gioiThieu;
            $sach->nxb_maFK = $request->nxb_ma;
            $sach->tl_maFK = $request->tl_ma;
            $sach->nn_maFK = $request->nn_ma;
            $sach->save();

            return response(['error'=>false,
                            'message'=>$sach->toJson()],200);
        }else{
            return response(['error'=>true,
                            'message'=>"Không tìm thấy sách sach[{$id}]"],200);
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
        $sach = sach::where('s_sku',$id)->first();
        if($sach){
            $sach->delete();
            return response(['error'=>false,
                            'message'=>"Đã xóa sách sach[{$id}]"],200);
        }else{
            return response(['error'=>true,
                            'message'=>"Không tìm thấy sách sach[{$id}]"],200);
        }
    }

    //Kiem tra ton tai cua sku
    public function checkExistSKU($value){
        try{
            $sku_check = sach::where('s_sku',$value)->first();
            return response(['error'=>false,
                            'message'=>$sku_check!=null?"true":"false"],200);
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
