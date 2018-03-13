<?php

namespace App\Http\Controllers;

use App\thanhtoan;
use function compact;
use Illuminate\Http\Request;
use function json_encode;
use function response;

class thanhtoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_thanhtoan = thanhtoan::all();
        $json = json_encode($ds_thanhtoan);
        return response(['error'=>false,
                        'message'=>compact('ds_thanhtoan','json')], 200);
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
        $thanhtoan = new thanhtoan();
        $thanhtoan->tt_ma = $request->tt_ma;
        $thanhtoan->tt_ten = $request->tt_ten;
        $thanhtoan->tt_dienGiai = $request->tt_dienGiai;
        $thanhtoan->tt_trangThai = $request->tt_trangThai;
        $thanhtoan->dh_maFK = $request->dh_ma;
        $thanhtoan->save();

        return response(['error'=>false,
                        'message'=>$thanhtoan->toJson()],200);
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
        $thanhtoan = thanhtoan::where('tt_ma',$id)->first();
        $result = ['error'=>$thanhtoan==null,
                    'message'=>($thanhtoan==null?"Không tìm thấy thanhtoan[{$id}]":$thanhtoan->toJson())];

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
        $thanhtoan = thanhtoan::where('tt_ma',$id)->first();
        if($thanhtoan){
            $thanhtoan->tt_ma = $request->tt_ma;
            $thanhtoan->tt_ten = $request->tt_ten;
            $thanhtoan->tt_dienGiai = $request->tt_dienGiai;
            $thanhtoan->tt_trangThai = $request->tt_trangThai;
            $thanhtoan->dh_maFK = $request->dh_ma;
            $thanhtoan->save();

            return response(['error'=>false,
                'message'=>$thanhtoan->toJson()],200);
        }else{
            return response(['error'=>true,
                            'message'=>"Không tìm thấy thanhtoan[{$id}]"],200);
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
        $thanhtoan = thanhtoan::where('tt_ma',$id)->first();
        if($thanhtoan){
            $thanhtoan->delete();
            return response(['error'=>false,
                            'message'=>"Đã xóa thanhtoan[{$id}]"],200);
        }else{
            return response(['error'=>true,
                            'message'=>"Không tìm thấy thanhtoan[{$id}]"],200);
        }
    }
}
