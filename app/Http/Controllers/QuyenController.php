<?php

namespace App\Http\Controllers;

use App\quyen;
use function compact;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function json_encode;
use function response;

class quyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $ds_quyen = quyen::all();
        $json = json_encode($ds_quyen);
        return response(['error'=>false,'message'=>compact('ds_quyen','json')],200);
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
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $quyen = new quyen();
        $quyen->q_ma = $request->q_ma;
        $quyen->q_ten = $request->q_ten;
        $quyen->q_dienGiai = $request->q_dienGiai;
        $quyen->q_trangThai = $request->q_trangThai;
        $quyen->save();
        return response(['error'=>false,'message'=>$quyen->toJson()],200);
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
        $quyen = quyen::where('q_ma',$id)->first();
        $result = ['error'=>$quyen==null,
                    'message'=>($quyen==null?"Không tìm thấy mã quyền quyen[{$id}]":$quyen->toJson())];
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
        $quyen = quyen::where('q_ma', $id)->first();
        if ($quyen) {
            $quyen->q_ma = $request->q_ma;
            $quyen->q_ten = $request->q_ten;
            $quyen->q_dienGiai = $request->q_dienGiai;
            $quyen->q_trangThai = $request->q_trangThai;
            $quyen->save();

            return response(['error'=>false,'message'=>$quyen->toJson()],200);
        }else{
            return response(['error'=>true,'message'=>"Không tìm thấy mã quyền quyen[{$id}]"],200);
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
        $quyen = quyen::where('q_ma',$id)->first();
        if($quyen){
            $quyen->delete();
            return response(['error'=>false, 'message'=>"Đã xóa quyền [{$id}]"],200);
        }else{
            return response(['error'=>true,'message'=>"Không tìm thấy mã quyền quyen[{$id}]"],200);
        }
    }
}
