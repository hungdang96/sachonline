<?php

namespace App\Http\Controllers;
use App\nhaxuatban;
use Illuminate\Http\Request;

class nhaxuatbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_nhaxuatban = nhaxuatban::all();
        $json = json_encode($ds_nhaxuatban);
        return response(['error' => false, 'message' => compact('ds_nhaxuatban', 'json')], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.nhaxuatban.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhaxuatban = new nhaxuatban();
        $nhaxuatban->nxb_ma = $request->nxb_ma;
        $nhaxuatban->nxb_ten = $request->nxb_ten;
        $nhaxuatban->nxb_diaChi = $request->nxb_diaChi;
        $nhaxuatban->save();

        return response(['error' => false, 'message' => $nhaxuatban->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nhaxuatban = nhaxuatban::where("nxb_ma", $id)->first();
        return response([
            'error' => $nhaxuatban == null,
            'message' => ($nhaxuatban == null?
                            "Khong tim thay chu cho [{$id}]":
                            $nhaxuatban -> toJson())
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
        $nhaxuatban = nhaxuatban::where("nxb_ma", $id)->first();
        $result = [
            'error' => $nhaxuatban == null,
            'message' => ($nhaxuatban == null?
                            "Khong tim thay nha xuat ban [{$id}]":
                            $nhaxuatban-> toJson())
        ];

        return View('cusc_qt.nhaxuatban.edit', ['result' => $result]);
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
        $nhaxuatban = nhaxuatban::where("nxb_ma", $id)->first();
        if ($nhaxuatban){
            $nhaxuatban->nxb_ma = $request->nxb_ma;
            $nhaxuatban->nxb_ten = $request->nxb_ten;
            $nhaxuatban->save();
            return response([
                    'error' => true,
                    'message'=> $nhaxuatban->toJson()
            ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay nha xuat ban [{$id}]"
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
        $nhaxuatban = nhaxuatban::where("nxb_ma", $id)->first();
        if ($nhaxuatban){
            $nhaxuatban->delete();
            return response([
                    'error' => false,
                    'message' => "Xoa nha xuat ban [{$id}] thanh cong"
                ], 200);
        } else{
            return response([
                    'error' => true,
                    'message'=> "Khong tim thay nha xuat ban [{$id}]"
            ], 200);
        }
    }

    public function checkExistName($value){
        try{
            $nxb_check = nhaxuatban::where('nxb_ten',$value)->first();
            return response(['error'=>false,
                'message'=>$nxb_check!=null?"true":"false"],200);
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
