<?php

namespace App\Http\Controllers;
use app\nhaphathanh;
use Illuminate\Http\Request;

class nhaphathanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_nhaphathanh = nhaphathanh::all();
        $json = json_encode($ds_nhaphathanh);
        return response(['error' => false, 'message' => compact('ds_nhaphathanh', 'json')], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.nhaphathanh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhaphathanh = new nhaphathanh();
        $nhaphathanh->nph_ma = $request->nph_ma;
        $nhaphathanh->nph_ten = $request->nph_ten;
        $nhaphathanh->nph_daiDien = $request->nph_daiDien;
        $nhaphathanh->nph_diaChi = $request->nph_diaChi;
        $nhaphathanh->nph_sdt = $request->nph_sdt;
        $nhaphathanh->nph_email = $request->nph_email;
        $nhaphathanh->save();

        return response(['error' => false, 'message' => $nhaphathanh->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nhaphathanh = nhaphathanh::where("nph_ma", $id)->first();
        return response([
            'error' => $nhaphathanh == null,
            'message' => ($nhaphathanh == null?
                            "Khong tim thay nha phat hanh [{$id}]":
                            $nhaphathanh -> toJson())
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
        $nhaphathanh = nhaphathanh::where("nph_ma", $id)->first();
        $result = [
            'error' => $nhaphathanh == null,
            'message' => ($nhaphathanh == null?
                            "Khong tim thay khach hang [{$id}]":
                            $nhaphathanh-> toJson())
        ];

        return View('cusc_qt.nhaphathanh.edit', ['result' => $result]);
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
        $nhaphathanh = nhaphathanh::where("nph_ma", $id)->first();
        if ($nhaphathanh){

            $nhaphathanh->nph_ma = $request->nph_ma;
            $nhaphathanh->nph_ten = $request->nph_ten;
            $nhaphathanh->nph_daiDien = $request->nph_daiDien;
            $nhaphathanh->nph_diaChi = $request->nph_diaChi;
            $nhaphathanh->nph_sdt = $request->nph_sdt;
            $nhaphathanh->nph_email = $request->nph_email;
            $nhaphathanh->save();

            return response([
                    'error' => true,
                    'message'=> $nhaphathanh->toJson()
            ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay nha phat hanh [{$id}]"
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
        $nhaphathanh = nhaphathanh::where("nph_ma", $id)->first();
        if ($nhaphathanh){
            $nhaphathanh->delete();
            return response([
                    'error' => false,
                    'message' => "Xoa nha phat hanh [{$id}] thanh cong"
                ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay nha phat hanh [{$id}]"
            ], 200);
        }
    }

    public function checkExistName($value){
        try{
            $nph_check = nhaphathanh::where('nph_ten',$value)->first();
            return response(['error'=>false,
                'message'=>$nph_check!=null?"true":"false"],200);
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
