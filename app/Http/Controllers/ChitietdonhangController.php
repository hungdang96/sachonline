<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chitietdonhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_chitietdonhang = chitietdonhang::all();
        $json = json_encode($ds_chitietdonhang);
        return response([
                'error' => false, 'message' => compact('ds_chitietdonhang', 'json')],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.chitietdonhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chitietdonhang = new chitietdonhang();
        $chitietdonhang->ctdh_soLuong = $request->ctdh_soLuong;
        $chitietdonhang->ctdh_donGia = $request->ctdh_donGia;
        $chitietdonhang->s_ma = $request->s_ma;
        $chude->save();
        return response(['error' => false, 'message' => $chitietdonhang->toJson()], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chitietdonhang = chitietdonhang::where("s_ma", $id)->first();
        return response([
                'error' => $chitietdonhang == null,
                'message' => ($chitietdonhang == null?
                            "Không tìm thấy chitietdonhang[{$id}]":
                            $chitietdonhang->toJson())
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
        $chitietdonhang = chitietdonhang::where("s_ma", $id)->first();
        $result = [
            'error' => $chitietdonhang == null,
            'message' => ($chitietdonhang == null?
                "Không tìm thấy chitietdonhang[{$id}]":
                $chitietdonhang->toJson())
        ];
        return View('cusc_qt.chitietdonhang.edit', ['result' => $result]);

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
        $chitietdonhang = chitietdonhang::where("s_ma", $id)
                            ->first();
        if ($chitietdonhang) {
            $chitietdonhang->ctdh_soLuong = $request->ctdh_soLuong;
            $chitietdonhang->ctdh_donGia = $request->ctdh_donGia;
            $chitietdonhang->s_ma = $request->s_ma;
            $chitietdonhang->save();
            return response([
                    'error' => false,
                    'message' => $chitietdonhang->toJson()
                ], 200);
        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy Chitietdonhang[{$id}]"
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
        $chitietdonhang = chitietdonhang::where("s_ma", $id)->first();
        if($chitietdonhang) {
            $chitietdonhang->delete();
            return response([
                    'error' => false,
                    'message' => "Xóa chitietdonhang[{$id}] thành công"], 200);

        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy chitietdonhang[{$id}]"
                ], 200);
        }
    }
}
