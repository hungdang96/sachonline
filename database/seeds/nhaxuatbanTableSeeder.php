<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class nhaxuatbanTableSeeder extends Seeder
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
        $n = 13;
        $NXBname = ['Alphabooks', 'NXB Trẻ', 'Văn Lang', 'First News', 'Thái Hà', 'Nhã Nam', 'Saigon Books', 'Phú Hà', 'Hải Đăng Book', 'DT Book', 'Phụ Nữ', '1980 Books', 'Nhà sách Minh Thắng'];
        $NXBaddress = ['số 2 Hồng Hà, Phường 2, Quận Tân Bình, TP Hồ Chí Minh', 'Số 384 Đường Hoàng Diệu, phường 06, Quận 4, TP Hồ Chí Minh', '18 Phạm Văn Chiêu, Phường 9, Quận Gò Vấp, TP Hồ Chí Minh', '25 Đường số 11, Khu phố 12, Phường Bình Hưng Hòa, Quận Bình Tân, TP Hồ Chí Minh', '2, Đường Quốc Lộ 1A, Khu phố 3, phường An Phú Đông, Quận 12, TP Hồ Chí Minh', 'Số 81 Cách Mạng Tháng Tám, Phường Bến Thành, Quận 1, TP Hồ Chí Minh', 'Số 3 Trần Nhật Duật, Phường Tân Định, Quận 1, TP Hồ Chí Minh', '145 Tôn Thất Đạm, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh', 'Tầng 6, Star Building, 33ter-33bis Mạc Đĩnh Chi, Phường Đa Kao, Quận 1, TP Hồ Chí Minh', '810 Happy Valley, Phường Tân Phong, Quận 7, TP Hồ Chí Minh', '905 Lũy Bán Bích, Phường Tân Thành, Quận Tân phú, TP Hồ Chí Minh', '40/8 Phạm Viêt Chánh, Phường 19, Quận Bình Thạnh, TP Hồ Chí Minh', '98 Đường số 32, Phường 10, Quận 6, TP Hồ Chí Minh'];

        for($i=0; $i <= $n; $i++){
            $id = guid();
            array_push($list,[
                //TODO insert each column info with each element.
                'nxb_ma' => $id,
                'nxb_ten' => $NXBname[$i],
                'nxb_diaChi' => $NXBaddress[$i]

            ]);
        }
        DB::table('nhaxuatban')->insert($list);
    }
}
