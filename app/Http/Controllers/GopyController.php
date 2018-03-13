<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_gopy = gopy::all();
        $json = json_encode($ds_gopy);
        return response([
                'error' => false, 'message' => compact('ds_gopy', 'json')],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.gopy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gopy = new gopy();
        $gopy->gy_thoiGian = $request->gy_thoiGian;
        $gopy->gy_noiDung = $request->gy_noiDung;
        $gopy->save();
        return response(['error' => false, 'message' => $gopy->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gopy= gopy::where("gy_ma", $id)->first();
        return response([
                'error' => $gopy == null,
                'message' => ($gopy == null?
                            "Không tìm thấy gopy[{$id}]":
                            $gopy->toJson())
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
        $gopy = gopy::where("gy_ma", $id)->first();
        $result = [
            'error' => $gopy == null,
            'message' => ($gopy == null?
                "Không tìm thấy gopy[{$id}]":
                $gopy->toJson())
        ];
        return View('cusc_qt.gopy.edit', ['result' => $result]);
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
        $gopy = gopy::where("gy_ma", $id)
                            ->first();
        if ($gopy) {
            $gopy->gy_thoiGian = $request->gy_thoiGian;
            $gopy->gy_noiDung = $request->gy_noiDung;
            $gopy->save();
            return response([
                    'error' => false,
                    'message' => $gopy->toJson()
                ], 200);
        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy gopy[{$id}]"
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
        $gopy = gopy::where("gy_ma", $id)->first();
        if($gopy) {
            $gopy->delete();
            return response([
                    'error' => false,
                    'message' => "Xóa gopy[{$id}] thành công"], 200);

        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy gopy[{$id}]"
                ], 200);
        }
    }
}
