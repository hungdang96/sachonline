<?php

namespace App\Http\Controllers;
use App\dichgia;
use Illuminate\Http\Request;

class dichgiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_dichgia = dichgia::all();
        $json = json_encode($ds_dichgia);
        return response([
                'error' => false, 'message' => compact('ds_dichgia', 'json')],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.dichgia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dichgia = new dichgia();
        $dichgia->dg_ten = $request->dg_ten;
        $dichgia->save();
        return response(['error' => false, 'message' => $dichgia->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dichgia= dichgia::where("dg_ma", $id)->first();
        return response([
                'error' => $dichgia == null,
                'message' => ($dichgia == null?
                            "Không tìm thấy dichgia[{$id}]":
                            $dichgia->toJson())
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
        $dichgia = dichgia::where("dg_ma", $id)->first();
        $result = [
            'error' => $dichgia == null,
            'message' => ($dichgia == null?
                "Không tìm thấy dichgia[{$id}]":
                $dichgia->toJson())
        ];
        return View('cusc_qt.dichgia.edit', ['result' => $result]);
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
        $dichgia = dichgia::where("dg_ma", $id)
                            ->first();
        if ($dichgia) {
            $dichgia->dg_ten = $request->dg_ten;
            $dichgia->save();
            return response([
                    'error' => false,
                    'message' => $dichgia->toJson()
                ], 200);
        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy dichgia[{$id}]"
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
        $dichgia = dichgia::where("dg_ma", $id)->first();
        if($dichgia) {
            $dichgia->delete();
            return response([
                    'error' => false,
                    'message' => "Xóa dichgia[{$id}] thành công"], 200);

        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy dichgia[{$id}]"
                ], 200);
        }
    }
}
