<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class dichgiaTableSeeder extends Seeder
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
//        $faker = Faker\Factory::create("vi_VN");
        //Khởi tạo các giá trị
        $n = 6;
        $DGname = ['Hồng Nhật', 'Bảo Long', 'Huỳnh Lý', 'Vũ Thái Hà', 'Trần Lan Anh', 'Trần Thị Thùy Trang'];

        for($i=0; $i <= $n; $i++){
            $id = guid();
            array_push($list,[
                //TODO insert each column info with each element.
                'dg_ma' => $id,
                'dg_ten' => $DGname[$i],

            ]);
        }
        DB::table('dichgia')->insert($list);
    }
}
