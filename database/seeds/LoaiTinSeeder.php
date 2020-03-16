<?php

use Illuminate\Database\Seeder;

class LoaiTinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_tin')->insert([
        	['id_theloai'=>'1','Ten' => 'Giáo Dục','TenKhongDau' => 'Giao-Duc'],
        	['id_theloai'=>'1','Ten' => 'Nhịp Điệu Trẻ','TenKhongDau' => 'Nhip-Dieu-Tre'],
        	['id_theloai'=>'1','Ten' => 'Du Lịch','TenKhongDau' => 'Du-Lich'],
        	['id_theloai'=>'1','Ten' => 'Du Học','TenKhongDau' => 'Du-Hoc'],
        	['id_theloai'=>'2','Ten' => 'Cuộc Sống Đó Đây','TenKhongDau' => 'Cuoc-Song-Do-Day'],
        	['id_theloai'=>'2','Ten' => 'Ảnh','TenKhongDau' => 'Anh'],
        	['id_theloai'=>'2','Ten' => 'Người Việt 5 Châu','TenKhongDau' => 'Nguoi-Viet-5-Chau'],
        	['id_theloai'=>'2','Ten' => 'Phân Tích','TenKhongDau' => 'Phan-Tich'],
        	['id_theloai'=>'3','Ten' => 'Chứng Khoán','TenKhongDau' => 'Chung-Khoan'],
        	['id_theloai'=>'3','Ten' => 'Bất Động Sản','TenKhongDau' => 'Bat-Dong-San'],
        	['id_theloai'=>'3','Ten' => 'Doanh Nhân','TenKhongDau' => 'Doanh-Nhan'],
        	['id_theloai'=>'3','Ten' => 'Quốc Tế','TenKhongDau' => 'Quoc-Te'],
        	['id_theloai'=>'3','Ten' => 'Mua Sắm','TenKhongDau' => 'Mua-Sam'],
        	['id_theloai'=>'3','Ten' => 'Doanh Nghiệp Viết','TenKhongDau' => 'Doanh-Nghiep-Viet'],
        	['id_theloai'=>'4','Ten' => 'Hoa Hậu','TenKhongDau' => 'Hoa-Hau'],
        	['id_theloai'=>'4','Ten' => 'Nghệ Sỹ','TenKhongDau' => 'Nghe-Sy'],
        	['id_theloai'=>'4','Ten' => 'Âm Nhạc','TenKhongDau' => 'Am-Nhac'],
        	['id_theloai'=>'4','Ten' => 'Thời Trang','TenKhongDau' => 'Thoi-Trang'],
        	['id_theloai'=>'4','Ten' => 'Điện Ảnh','TenKhongDau' => 'Dien-Anh'],
        	['id_theloai'=>'4','Ten' => 'Mỹ Thuật','TenKhongDau' => 'My-Thuat'],
        	['id_theloai'=>'5','Ten' => 'Bóng Đá','TenKhongDau' => 'Bong-Da'],
        	['id_theloai'=>'5','Ten' => 'Tennis','TenKhongDau' => 'Tennis'],
        	['id_theloai'=>'5','Ten' => 'Chân Dung','TenKhongDau' => 'Chan-Dung'],
        	['id_theloai'=>'5','Ten' => 'Ảnh','TenKhongDau' => 'Anh-TT'],
        	['id_theloai'=>'6','Ten' => 'Hình Sự','TenKhongDau' => 'Hinh-Su']

        ]);
    }
}
