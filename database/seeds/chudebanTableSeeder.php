<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class chudebanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //khởi tạo carbon
//        $now = Carbon::now();
        //Tạo mảng rỗng $list[]
        $list = [];
        //Khởi tạo các giá trị
        $n = 6;
        $chude = ['Thiếu nhi','Gia đình & hôn nhân','Tâm lý','Y học','Tin học','Kỹ năng sống'];
        $chudeDesc = ['Sách thiếu nhi','Sách về gia đình và hôn nhân','Sách về tâm lý học','Sách tin học','Sách về kỹ năng sống'];
        //......And more than array if here is more than 2 columns in your table db, except the timestamp columns
        $trangThai = 1;

        for($i=0; $i <= $n; $i++){
            $id = guid();
            array_push($list,[
                'cd_ma' => $id,
                'cd_ten' => $chude[$i],
                'cd_dienGiai' => $chudeDesc[$i],
                'cd_trangThai' => $trangThai
            ]);
        }
        DB::table('...TableSeeder')->insert($list);
    }
}
