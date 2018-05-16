<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ngonnguTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //khởi tạo carbon
        // $now = Carbon::now();
        //Tạo mảng rỗng $list[]
        $list = [];
        //Khởi tạo các giá trị
        $n = 5;
        $lang = ['Tiếng Việt','Tiếng Anh','Tiếng Nhật','Tiếng Hàn Quốc','Tiếng Nga'];
        $locale = ['vi','en','jp','kr','ru'];

        for($i=0; $i <= $n; $i++){
            $id = guid();
            array_push($list,[
                'nn_ma'=>$id,
                'nn_ten'=>$lang[$i],
                'kihieu'=>$locale[$i]
            ]);
        }
        DB::table('...')->insert($list);
    }
}
