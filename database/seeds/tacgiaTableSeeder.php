<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class tacgiaTableSeeder extends Seeder
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
        $faker = Faker\Factory::create("vi_VN");
        //Khởi tạo các giá trị
        $n = 16;
        $FirstColElements = ['Nguyễn Nhật Ánh', 'Phạm Quỳnh An', 'Phan Minh Châu ', 'Phạm Vân Anh', 'Phạm Ánh', 'Mai Tú Ân', 'Phạm Thái Ba', 'Nguyễn Kim Bang', 'Paulo Coelho', 'Hector Malot', 'Mark Twain', 'Tetsuko Kuroyanagi', 'Harper Lee', 'Antoine de Saint-Exupéry', 'Yann Martel', 'Andrea Hirata'];
        $SecondColElements = ['Việt Nam', 'Việt Nam', 'Việt Nam', 'Việt Nam', 'Việt Nam', 'Việt Nam', 'Việt Nam', 'Việt Nam', 'Barazil', 'Pháp', 'Mỹ', 'Nhật', 'Mỹ', 'Pháp', 'Canada', 'Indonesia'];
        //......And more than array if here is more than 2 columns in your table db, except the timestamp columns

        for($i=0; $i <= $n; $i++){
            $id = guid();
            array_push($list,[
                'tg_ma' => $id,
                'tg_ten' => $FirstColElements[$i],
                'tg_quocTich' => $SecondColElements[$i]
            ]);
        }
        DB::table('tacgia')->insert($list);
    }
}
