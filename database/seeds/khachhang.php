<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class khachhang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];

        //Tao doi tuong cua lop VnFullname de sinh ten tieng Viet
        $uFN = new VnFullname();

        //Tao doi tuong cua lop VNPersonalInfo de sinh thong tin ca nhan
        $uPI = new VnPersonalInfo();

        //Thiet lap so luong khach hang can sinh du lieu
        $nCustomer = 100;

        $minFemales = 10;
        $maxFemales = 50;

        //sinh ngau nhien so luong khac la nu
        $nFemales = VnBase::RandomNumber($minFemales, $maxFemales);
        //tinh so luong khach hang la nam
        $nMales = $nCustomer - $nFemales;

        $female = $uFN -> FullNames(VnBase::VnFemale, $nFemales);
        $males = $uFN -> FullNames(VnBase::VnMale, $nMales);


    }
}
