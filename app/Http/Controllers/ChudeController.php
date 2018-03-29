<?php

namespace App\Http\Controllers;
use App\chude;
use Illuminate\Http\Request;

class chudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_chude = chude::all();
        $json = json_encode($ds_chude);
        return response([
                'error' => false, 'message' => compact('ds_chude', 'json')],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('cusc_qt.chude.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chude = new chude();
        $chude->s_maFK = $request->s_maFK;
        $chude->cd_maFK = $request->cd_maFK;
        $chude->cd_ten = $request->cd_ten;
        $chude->cd_trangThai = $request->cd_trangThai;
        $chude->save();
        return response(['error' => false, 'message' => $chude->toJson()], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chude= chude::where("cd_ma", $id)->first();
        return response([
                'error' => $chude == null,
                'message' => ($chude == null?
                            "Không tìm thấy chude[{$id}]":
                            $chude->toJson())
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
        $chude = chude::where("cd_ma", $id)->first();
        $result = [
            'error' => $chude == null,
            'message' => ($chude == null?
                "Không tìm thấy chude[{$id}]":
                $chude->toJson())
        ];
        return View('cusc_qt.chude.edit', ['result' => $result]);
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
        $chude = chude::where("cd_ma", $id)
                            ->first();
        if ($chude) {
            $chude->s_maFK = $request->s_maFK;
            $chude->cd_maFK = $request->cd_maFK;
            $chude->cd_ten = $request->cd_ten;
            $chude->cd_trangThai = $request->cd_trangThai;
            $chude->save();
            return response([
                    'error' => false,
                    'message' => $chude->toJson()
                ], 200);
        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy chude[{$id}]"
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
        $chude = chude::where("cd_ma", $id)->first();
        if($chude) {
            $chude->delete();
            return response([
                    'error' => false,
                    'message' => "Xóa chude[{$id}] thành công"], 200);

        } else {
            return response([
                    'error' => true,
                    'message' => "Không tìm thấy chude[{$id}]"
                ], 200);
        }
    }

    public function checkExistName($value){
        try{
            $chude_check = chude::where('cd_ten',$value)->first();
            return response(['error'=>false,
                            'message'=>$chude_check!=null?"true":"false"],200);
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
