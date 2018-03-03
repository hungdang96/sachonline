<?php

use Illuminate\Database\Seeder;

class quyen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [];
        //$qList = [];
        $nQuyen = 6;
        $quyenElement = ['Giám đốc', 'Quản trị', 'Quản lý kho', 'Kế toán', 'Nhân viên bán hàng', 'Nhân viên giao hàng'];
        $quyenDesc = ['Giám đốc công ty', 'Quản trị công ty', 'Quản lý kho công ty', 'Kế toán công ty', 'Nhân viên bán hàng công ty', 'Nhân viên giao hàng công ty'];
        //$giamdoc = ['name' => 'Giám đốc', 'desc' => 'Giám đốc công ty'];
        //$quantri = ['name' => 'Quản trị', 'desc' => 'Quản trị web'];
        //$quanlykho = ['name' => 'Quản lý kho', 'desc' => 'Quản lý kho công ty'];
        //$ketoan = ['name' => 'Kế toán', 'desc' => 'Kế toán công ty'];
        //$nvbanhang = ['name' => 'Nhân viên bán hàng', 'desc' => 'Nhân viên bán hàng công ty'];
        //$nvgiaohang = ['name' => 'Nhân viên giao hàng', 'desc' => 'Nhân viên giao hàng công ty'];
        $today = new DateTime('2018-03-03 16:00:00');
        $trangThai = 1;
        //array_push($qList,[$giamdoc,$quantri,$quanlykho,$ketoan,$nvbanhang,$nvgiaohang]);
        for($i=1; $i <= $nQuyen; $i++){
            array_push($list,[
                'q_ma' => $i,
                'q_ten' => $quyenElement[$i-1],
                'q_dienGiai' => $quyenDesc[$i-1],
                'q_tao' => $today,
                'q_capNhat' => $today,
                'q_trangThai' => $trangThai
            ]);
        }
        DB::table('quyen')->insert($list);
    }
}
