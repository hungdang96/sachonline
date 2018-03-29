<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class nhaphathanhTableSeeder extends Seeder
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
        $FirstColElements = [];
        $SecondColElements = [];
        //......And more than array if here is more than 2 columns in your table db, except the timestamp columns
        $trangThai = 1;

        for($i=1; $i <= $n; $i++){
            array_push($list,[
                //TODO insert each column info with each element.
            ]);
        }
        DB::table('...TableSeeder')->insert($list);
    }
}
