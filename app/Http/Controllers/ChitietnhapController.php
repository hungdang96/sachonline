<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chitietnhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_chitietnhap = chitietnhap::all();
        $json = json_encode($ds_chitietnhap);
        return response([
                'error' => false, 'message' => compact('ds_chitietnhap', 'json')],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.chitietnhap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chitietnhap = new chitietnhap();
        $chitietnhap->s_maFK = $request->s_maFK;
        $chitietnhap->pn_maFK = $request->pn_maFK;
        $chitietnhap->ctn_soLuong = $request->ctn_soLuong;
        $chitietnhap->ctn_donGia = $request->ctn_donGia;
        $chude->save();
        return response(['error' => false, 'message' => $chitietnhap->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chitietnhap= chitietnhap::where("s_maFK", $id)->first();
        return response([
                'error' => $chitietnhap == null,
                'message' => ($chitietnhap == null?
                            "Không tìm thấy chitietnhap[{$id}]":
                            $chitietnhap->toJson())
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
        $chitietnhap = chitietnhap::where("s_maFK", $id)->first();
        $result = [
            'error' => $chitietnhap == null,
            'message' => ($chitietnhap == null?
                "Không tìm thấy chitietnhap[{$id}]":
                $chitietnhap->toJson())
        ];
        return View('cusc_qt.chitietnhap.edit', ['result' => $result]);
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
        $chitietnhap = chitietnhap::where("s_maFK", $id)
                            ->first();
        if ($chitietnhap) {
            $chitietnhap->s_maFK = $request->s_maFK;
            $chitietnhap->pn_maFK = $request->pn_maFK;
            $chitietnhap->ctn_soLuong = $request->ctn_soLuong;
            $chitietnhap->ctn_donGia = $request->ctn_donGia;
            $chitietnhap->save();
            return response([
                    'error' => false,
                    'message' => $chitietnhap->toJson()
                ], 200);
        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy Chitietnhap[{$id}]"
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
       $chitietnhap = chitietnhap::where("s_maFK", $id)->first();
        if($chitietnhap) {
            $chitietnhap->delete();
            return response([
                    'error' => false,
                    'message' => "Xóa chitietnhap[{$id}] thành công"], 200);

        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy chitietnhap[{$id}]"
                ], 200);
        }
    }
}
