<?php

namespace App\Http\Controllers;

use App\tacgia;
use App\theloai;
use function compact;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\View\View;
use function json_encode;
use PDOException;
use function response;

class tacgiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_tacgia = tacgia::all();
        $json = json_encode($ds_tacgia);
        return response(['error'=>false,
                        'message'=>compact('ds_tacgia','json')],200);
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
        $tacgia = new tacgia();
        $tacgia->tg_ma = $request->tg_ma;
        $tacgia->tg_ten = $request->tg_ten;
        $tacgia->tg_quocTich = $request->tg_quocTich;
        $tacgia->s_maFK = $request->s_ma;
        $tacgia->save();

        return response(['error'=>false,
                        'message'=>$tacgia->toJson()],200);
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
        $tacgia = tacgia::where('tg_ma',$id)->first();
        $result = ['error'=>$tacgia==null,
                'message'=>($tacgia==null?"Không tìm thấy tác giả tacgia[{$id}]":$tacgia->toJson())];
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
        $tacgia = tacgia::where('tg_ma',$id)->first();
        if($tacgia){
            $tacgia->tg_ma = $request->tg_ma;
            $tacgia->tg_ten = $request->tg_ten;
            $tacgia->tg_quocTich = $request->tg_quocTich;
            $tacgia->s_maFK = $request->s_ma;
            $tacgia->save();

            return response(['error'=>false,
                            'message'=>$tacgia->toJson()],200);
        }else{
            return response(['error'=>true,
                            'message'=>"Không tìm thấy tác giả tacgia[{$id}]"],200);
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
        $tacgia = tacgia::where('tg_ma',$id)->first();
        if($tacgia){
            $tacgia->delete();
            return response(['error'=>false,
                            'message'=>"Đã xóa tác giả tacgia[{$id}]"],200);
        }else{
            return response(['error'=>true,
                            'message'=>"Không thể tìm thấy tác giả tacgia[{$id}]"],200);
        }
    }

    public function checkExistName($value){
        try{
            $tacgia_check = tacgia::where('cd_ten',$value)->first();
            return response(['error'=>false,
                'message'=>$tacgia_check!=null?"true":"false"],200);
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
