<?php

namespace App\Http\Controllers;
use app\ngonngu;
use Illuminate\Http\Request;

class ngonnguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_ngonngu = ngonngu::all();
        $json = json_encode($ds_ngonngu);
        return response(['error' => false, 'message' => compact('ds_ngonngu', 'json')], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.ngonngu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ngonngu = new ngonngu();
        $ngonngu->nn_ma = $request->nn_ma;
        $ngonngu->nn_ten = $request->nn_ten;
        $ngonngu->save();

        return response(['error' => false, 'message' => $ngonngu->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ngonngu = ngonngu::where("nn_ma", $id)->first();
        return response([
            'error' => $ngonngu == null,
            'message' => ($ngonngu == null?
                            "Khong tim thay ngon ngu [{$id}]":
                            $ngonngu -> toJson())
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
        $ngonngu = ngonngu::where("nn_ma", $id)->first();
        $result = [
            'error' => $ngonngu == null,
            'message' => ($ngonngu == null?
                            "Khong tim thay ngon ngu [{$id}]":
                            $ngonngu-> toJson())
        ];

        return View('cusc_qt.ngonngu.edit', ['result' => $result]);
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
        $ngonngu = ngonngu::where("nn_ma", $id)->first();
        if ($ngonngu){
            $ngonngu->nn_ma = $request->nn_ma;
            $ngonngu->nn_ten = $request->nn_ten;
            $ngonngu->save();
            return response([
                    'error' => true.
                    'message'=> $ngonngu->toJson()
            ], 200);
        } else{
            return response([
                    'error' => true.
                    'message'=> "Khong tim thay ngon ngu [{$id}]"
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
        $ngonngu = ngonngu::where("nn_ma", $id)->first();
        if ($ngonngu){
            $ngonngu->delete();
            return response([
                    'error' => false,
                    'message' => "Xoa ngon ngu [{$id}] thanh cong"
                ], 200);
        } else{
            return response([
                    'error' => true.
                    'message'=> "Khong tim thay ngon ngu [{$id}]"
            ], 200);
        }
    }
    }
}
