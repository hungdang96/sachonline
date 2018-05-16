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
        //Tạo mảng rỗng $list[]
        $list = [];
        //Khởi tạo các giá trị
        $n = 6;
        $tl_ten = ['Truyện ngắn','Tiểu thuyết','Ngôn tình','Hư cấu','Kinh dị','Bài báo'];
        //......And more than array if here is more than 2 columns in your table db, except the timestamp columns
        $trangThai = 1;

        for($i=0; $i <= $n; $i++){
            $id = guid();
            array_push($list,[
                //TODO insert each column info with each element.
                'tl_ma' => $id,
                'tl_ten' => $tl_ten[$i],
                'tl_trangThai' => $trangThai
            ]);
        }
        DB::table('theloai')->insert($list);
    }
}
