<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class theloaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //khởi tạo carbon
        $now = Carbon::now();
        //Tạo mảng rỗng $list[]
        $list = [];
        //Khởi tạo các giá trị
        $n = 6;
        $tl_ma = ['TL_01','TL_02','TL_03','TL_04','TL_05','TL_06'];
        $tl_ten = ['Truyện ngắn','Tiểu thuyết','Ngôn tình','Hư cấu','Kinh dị','Bài báo'];
        //......And more than array if here is more than 2 columns in your table db, except the timestamp columns
        $trangThai = 1;

        for($i=1; $i <= $n; $i++){
            array_push($list,[
                //TODO insert each column info with each element.
                'tl_ma' => $tl_ma[$i-1],
                'tl_ten' => $tl_ten[$i-1],
                'tl_trangThai' => $trangThai
            ]);
        }
        DB::table('theloai')->insert($list);
    }
}
