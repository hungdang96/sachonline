<?php

namespace App\Http\Controllers;
use App\nhanvien;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PDOException;

class nhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_nhanvien = nhanvien::all();
        $json = json_encode($ds_nhanvien);
        return response(['error' => false, 'message' => compact('ds_nhanvien', 'json')], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.nhanvienTableSeeder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhanvien = new nhanvien();
        $nhanvien->nv_ma = $request->nv_ma;
        $nhanvien->nv_taiKhoan = $request->nv_taiKhoan;
        $nhanvien->nv_matKhau = $request->nv_matKhau;
        $nhanvien->nv_hoTen = $request->nv_hoTen;
        $nhanvien->nv_gioiTinh = $request->nv_gioiTinh;
        $nhanvien->nv_email = $request->nv_email;
        $nhanvien->nv_ngaySinh = $request->nv_ngaySinh;
        $nhanvien->nv_diaChi = $request->nv_diaChi;
        $nhanvien->nv_sdt = $request->nv_sdt;
        $nhanvien->save();

        return response(['error' => false, 'message' => $nhanvien->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nhanvien = nhanvien::where("nv_ma", $id)->first();
        return response([
            'error' => $nhanvien == null,
            'message' => ($nhanvien == null?
                            "Khong tim thay nhan vien [{$id}]":
                            $nhanvien -> toJson())
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
        $nhanvien = nhanvien::where("nv_ma", $id)->first();
        $result = [
            'error' => $nhanvien == null,
            'message' => ($nhanvien == null?
                            "Khong tim thay nhan vien [{$id}]":
                            $nhanvien-> toJson())
        ];

        return View('cusc_qt.nhanvienTableSeeder.edit', ['result' => $result]);
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
        $nhanvien = nhanvien::where("nv_ma", $id)->first();
        if ($nhanvien){
            $nhanvien->nv_ma = $request->nv_ma;
            $nhanvien->nv_taiKhoan = $request->nv_taiKhoan;
            $nhanvien->nv_matKhau = $request->nv_matKhau;
            $nhanvien->nv_hoTen = $request->nv_hoTen;
            $nhanvien->nv_gioiTinh = $request->nv_gioiTinh;
            $nhanvien->nv_email = $request->nv_email;
            $nhanvien->nv_ngaySinh = $request->nv_ngaySinh;
            $nhanvien->nv_diaChi = $request->nv_diaChi;
            $nhanvien->nv_sdt = $request->nv_sdt;
            $nhanvien->save();

            return response([
                    'error' => true,
                    'message'=> $nhanvien->toJson()
            ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay nhan vien [{$id}]"
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
        $nhanvien = nhanvien::where("nv_ma", $id)->first();
        if ($nhanvien){
            $nhanvien->delete();
            return response([
                    'error' => false,
                    'message' => "Xoa nhan vien [{$id}] thanh cong"
                ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay nhan vien [{$id}]"
            ], 200);
        }
    }

    public function checkExistName($value){
        try{
            $nv_check = nhanvien::where('nv_ten',$value)->first();
            return response(['error'=>false,
                'message'=>$nv_check!=null?"true":"false"],200);
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

    public function checkExistID($value){
        try{
            $id_check = nhanvien::where('nv_ma',$value)->first();
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
