<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class khachhangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=[];
        $faker = Faker\Factory::create("vi_VN");

        //Tao doi tuong cua lop VnFullname de sinh ten tieng Viet
        $uFN = new VnFullname();

        //Tao doi tuong cua lop VNPersonalInfo de sinh thong tin ca nhan
        $uPI = new VnPersonalInfo();

        //Thiet lap so luong khach hang can sinh du lieu
        $nCustomer = 50;

        $minFemales = 10;
        $maxFemales = 20;

        //sinh ngau nhien so luong khac la nu
        $nFemales = VnBase::RandomNumber($minFemales, $maxFemales);
        //tinh so luong khach hang la nam
        $nMales = $nCustomer - $nFemales;

        $female = $uFN -> FullNames(VnBase::VnFemale, $nFemales);
        $males = $uFN -> FullNames(VnBase::VnMale, $nMales);

        $customer = [];
        $m = 0;
        $f = 0;
        while ($m <= $nMales-1 || $f <= $nFemales-1){
            if($m == $nMales){
                array_push($customer,["gender"=>VnBase::VnFemale, "name"=>$female[$f]]);
                $f++;
            }elseif ($f == $nFemales){
                array_push($customer,["gender"=>VnBase::VnMale,"name"=>$males[$m]]);
                $m++;
            }
            else{
                if(VnBase::RandomNumber(0,1000) < 550){
                    array_push($customer,["gender"=>VnBase::VnMale,"name"=>$males[$m]]);
                    $m++;
                }else{
                    array_push($customer,["gender"=>VnBase::VnFemale, "name"=>$female[$f]]);
                    $f++;
                }
            }
        }
        $today = new DateTime('2018-03-03 9:00:00');
        for($i = 0; $i < $nCustomer; $i++){
//            $id_temp = $faker->bothify('KH-##???-###??-##?#?');
            $id = guid();
            //Lay gioi tinh cua khach hang thu i
            if($customer[$i]["gender"]==0){
                $gender = 'Nữ';
            }else{
                $gender = 'Nam';
            }
            //Lay ten cua khach hang thu i
            $name = $customer[$i]["name"];
            //Sinh ngau nhien tuoi
            $age = $uPI->Age(15);
            //Tinh nam sinh cua khach hang dua vao tuoi
            $birthYear = $uPI->BirthYearValue($age);
            //sinh ngau nhien ngay sinh
            $birthDay = $uPI->Birthdate($birthYear);
            //sinh email dua vao thong tin ca nhan
            $email = $uPI->Email($name, $birthDay, "", "?","", VnBase::VnLowerCase, VnBase::VnMixed, VnBase::VnTrue);
            //sinh ten dang nhap dua vao thong tin khach hang
            $usr = $uPI->Username($name, $birthYear, "", "", VnBase::VnLowerCase, VnBase::VnMixed, VnBase::VnTrue);
            //sinh ngau nhien mat khau voi thua toan bam md5
            $pwd = md5($faker->text(10));
            //sinh ngau nhien sdt cho khach hang
            $sdt = $uPI->Mobile("",VnBase::VnFalse);
            //sinh ngau nhien
            $address = $uPI->Address();
            array_push($list,[
                'kh_ma' => $id,
                'kh_taiKhoan' => $usr,
                'kh_matKhau' => $pwd,
                'kh_hoTen' => $name,
                'kh_gioiTinh' => $gender,
                'kh_email' => $email,
                'kh_ngaySinh' => $birthDay["birthdate"],
                'kh_diaChi' => $address,
                'kh_soDienThoai' => $sdt,
                'kh_taoMoi' => $today->format('Y-m-d H:i:s'),
                'kh_capNhat' => $today->format('Y-m-d H:i:s'),
                'kh_trangThai' => ($i <= $nCustomer-3? 2: 3)
            ]);
        }
        DB::table('khachhang')->insert($list);
    }
}
