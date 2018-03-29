<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class nhanvienTableSeeder extends Seeder
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
            $id_temp = $faker->bothify('NV-##?#??');
            $id = $faker->toUpper($id_temp);
            //Lay gioi tinh cua khach hang thu i
            if($customer[$i]["gender"]==0){
                $gender = 'Nữ';
            }else{
                $gender = 'Nam';
            }
            //Lay ten cua khach hang thu i
            $name = $customer[$i]["name"];
            //Sinh ngau nhien tuoi
            $age = $uPI->Age(23);
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
            //Ma quyenTableSeeder
            if($i == 0){
                $quyenMa = 1;
            }else{
                $quyenMa = $faker->numberBetween(2,6);
            }
            array_push($list, [
                'nv_ma' => $id,
                'nv_taiKhoan' => $usr,
                'nv_matKhau' => $pwd,
                'nv_hoTen' => $name,
                'nv_gioiTinh' => $gender,
                'nv_email' => $email,
                'nv_ngaySinh' => $birthDay["birthdate"],
                'nv_diaChi' => $address,
                'nv_sdt' => $sdt,
                'nv_tao' => $today->format('Y-m-d H:i:s'),
                'nv_capNhat' => $today->format('Y-m-d H:i:s'),
                'nv_trangThai' => '1',
                'q_maFK' => $quyenMa
            ]);
        }
        DB::table('nhanvien')->insert($list);
    }
}
