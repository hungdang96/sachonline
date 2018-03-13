<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chudekhuyenmaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_chudekhuyenmai = chudekhuyenmai::all();
        $json = json_encode($ds_chudekhuyenmai);
        return response([
                'error' => false, 'message' => compact('ds_chudekhuyenmai', 'json')],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.chudekhuyenmai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chudekhuyenmai = new chudekhuyenmai();
        $chudekhuyenmai->cdkm_giaTri = $request->cdkm_giaTri;
        $chudekhuyenmai->save();
        return response(['error' => false, 'message' => $chudekhuyenmai->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chudekhuyenmai= chudekhuyenmai::where("km_maFK", $id)->first();
        return response([
                'error' => $chudekhuyenmai == null,
                'message' => ($chudekhuyenmai == null?
                            "Không tìm thấy chudekhuyenmai[{$id}]":
                            $chudekhuyenmai->toJson())
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
        $chudekhuyenmai = chudekhuyenmai::where("km_maFK", $id)->first();
        $result = [
            'error' => $chudekhuyenmai == null,
            'message' => ($chudekhuyenmai == null?
                "Không tìm thấy chudekhuyenmai[{$id}]":
                $chudekhuyenmai->toJson())
        ];
        return View('cusc_qt.chudekhuyenmai.edit', ['result' => $result]);
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
        $chudekhuyenmai = chudekhuyenmai::where("km_maFK", $id)
                            ->first();
        if ($chudekhuyenmai) {
            $chudekhuyenmai->cdkm_giaTri = $request->cdkm_giaTri;
            $chudekhuyenmai->cdkm_trangThai = $request->cdkm_trangThai;
            $chudekhuyenmai->save();
            return response([
                    'error' => false,
                    'message' => $chudekhuyenmai->toJson()
                ], 200);
        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy chudekhuyenmai[{$id}]"
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
        $chudekhuyenmai = chudekhuyenmai::where("km_maFK", $id)->first();
        if($chudekhuyenmai) {
            $chudekhuyenmai->delete();
            return response([
                    'error' => false,
                    'message' => "Xóa chudekhuyenmai[{$id}] thành công"], 200);

        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy chudekhuyenmai[{$id}]"
                ], 200);
        }
    }
}
