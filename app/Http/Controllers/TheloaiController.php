<?php

namespace App\Http\Controllers;

use App\theloai;
use function compact;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function json_encode;
use PDOException;

class theloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_theloai = theloai::all();
        $json = json_encode($ds_theloai);
        return response(['error'=>false,
                        'message'=>compact('ds_theloai','json')],200);
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
        $theloai = new theloai();
        $theloai->tl_ma = $request->tl_ma;
        $theloai->tl_ten = $request->tl_ten;
        $theloai->tl_trangThai = $request->tl_trangThai;
        $theloai->save();

        return response(['error'=>false,
                        'message'=>$theloai->toJson()],200);

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
        $theloai = theloai::where('tl_ma',$id)->first();
        $result = ['error'=>$theloai==null,
                    'message'=>($theloai==null?"Không tìm thấy thể loại theloai[{$id}]":$theloai->toJson())];

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
        $theloai = theloai::where('tl_ma',$id)->first();
        if($theloai){
            $theloai->tl_ma = $request->tl_ma;
            $theloai->tl_ten = $request->tl_ten;
            $theloai->tl_trangThai = $request->tl_trangThai;
            $theloai->save();

            return response(['error'=>false,
                            'message'=>$theloai->toJson()],200);
        }else{
            return response(['error'=>true,
                            'message'=>"Không tìm thấy thể loại theloai[{$id}]!"],200);
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
        $theloai = theloai::where('tl_ma',$id)->first();
        if($theloai){
            $theloai->delete();
            return response(['error'=>false,
                            'message'=>"Đã xóa thể loại theloai[{$id}]"],200);
        }else{
            return response(['error'=>true,
                            'message'=>"Không thể tìm thấy thể loại theloai[{$id}]"],200);
        }
    }

    public function checkExistName($value){
        try{
            $theloai_check = theloai::where('tl_ten',$value)->first();
            return response(['error'=>false,
                'message'=>$theloai_check!=null?"true":"false"],200);
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

    public function checkExistID($value){
        try{
            $id_check = theloai::where('tl_ma',$value)->first();
            return response(['error'=>false,
                'message'=>$id_check!=null?"true":"false"],200);
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
