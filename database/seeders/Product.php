<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'name' => 'Điện thoại iPhone 11 64GB ',
            'manu_id' => 1,
            'type_id' => 2,
            'price' => 15790000,
            'description' => 'Nâng cấp mạnh mẽ về camera, Hiệu năng mạnh mẽ hàng đầu thế giới, Những thay đổi về thiết kế theo hướng tích cực, Thời lượng pin tốt nhất từ trước tới nay',
            'feature' => 0,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '4 GB',
            'Dung_Luong' => '64 GB',
            'HDH' => 'IOS 15',
            'chip' => 'Apple A13 Bionic',
            'origin' => 'Mỹ',
        ]);
        DB::table('product')->insert([
            'name' => 'Điện thoại iPhone 13 Pro Max 128GB',
            'manu_id' => 1,
            'type_id' => 2,
            'price' => 33990000,
            'description' => 'iPhone 13 Pro Max 128 GB - siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.',
            'feature' => 1,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '6 GB',
            'Dung_Luong' => '128 GB',
            'HDH' => 'IOS 15',
            'chip' => 'Apple A15 Bionic',
            'origin' => 'Mỹ',
        ]);
        DB::table('product')->insert([
            'name' => 'Điện thoại Samsung Galaxy S22 Ultra 5G 128GB',
            'manu_id' => 2,
            'type_id' => 2,
            'price' => 30900000,
            'description' => 'Galaxy S22 Ultra 5G chiếc smartphone cao cấp nhất trong bộ 3 Galaxy S22 series mà Samsung đã cho ra mắt. Tích hợp bút S Pen hoàn hảo trong thân máy, trang bị vi xử lý mạnh mẽ cho các tác vụ sử dụng vô cùng mượt mà và nổi bật hơn với cụm camera không viền độc đáo mang đậm dấu ấn riêng.',
            'feature' => 1,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '8 GB',
            'Dung_Luong' => '128 GB',
            'HDH' => 'Android 12',
            'chip' => 'Snapdragon 8 Gen 1 8 nhân',
            'origin' => 'Hàn Quốc',
        ]);
        DB::table('product')->insert([
            'name' => 'Điện thoại Samsung Galaxy A03 3GB',
            'manu_id' => 2,
            'type_id' => 2,
            'price' => 2890000,
            'description' => 'Samsung Galaxy A03 là chiếc điện thoại Galaxy A đầu tiên của nhà Samsung trong năm 2022 tại thị trường Việt Nam. Đây là sản phẩm có mức giá dễ tiếp cận, có camera chính đến 48 MP, pin 5000 mAh thoải mái sử dụng cả ngày.',
            'feature' => 0,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '3 GB',
            'Dung_Luong' => '32 GB',
            'HDH' => 'Android 11',
            'chip' => 'Unisoc T606 8 nhân',
            'origin' => 'Hàn Quốc',
        ]);
        DB::table('product')->insert([
            'name' => 'Điện thoại OPPO A16K',
            'manu_id' => 3,
            'type_id' => 2,
            'price' => 3290000,
            'description' => 'OPPO chính thức trình làng mẫu smartphone giá rẻ - OPPO A16K sở hữu màu sắc thời thượng, viên pin dung lượng cao, cấu hình khỏe, selfie lung linh, một lựa chọn thú vị cho người tiêu dùng.',
            'feature' => 0,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '3 GB',
            'Dung_Luong' => '32 GB',
            'HDH' => 'Androi 11',
            'chip' => 'MediaTek Helio G35',
            'origin' => 'Việt Nam',
        ]);
        DB::table('product')->insert([
            'name' => 'Điện thoại OPPO Reno7 Z 5G',
            'manu_id' => 3,
            'type_id' => 2,
            'price' => 10490000,
            'description' => 'OPPO đã trình làng mẫu Reno7 Z 5G với thiết kế OPPO Glow độc quyền, camera mang hiệu ứng như máy DSLR chuyên nghiệp cùng viền sáng kép, máy có một cấu hình mạnh mẽ và đạt chứng nhận xếp hạng A về độ mượt.',
            'feature' => 1,
            'quantity' => 1,
            'status' => 1,
            'image' => ' ',
            'Gram' => '8 GB',
            'Dung_Luong' => '1120 GB',
            'HDH' => 'Androi 11',
            'chip' => 'Snapdragon 695 5G 8 nhân',
            'origin' => 'Việt Nam',
        ]);
        DB::table('product')->insert([
            'name' => 'Laptop Apple MacBook Air M1 2020 16GB/256GB/7-core GPU (Z124000DE)',
            'manu_id' => 1,
            'type_id' => 1,
            'price' => 28890000,
            'description' => 'Laptop Apple MacBook Air M1 2020 có thiết kế đẹp, sang trọng với CPU M1 độc quyền từ Apple cho hiệu năng đồ họa cao, màn hình Retina hiển thị siêu nét cùng với hệ thống bảo mật tối ưu.',
            'feature' => 1,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '16 GB',
            'Dung_Luong' => '256 GB',
            'HDH' => 'Mac OS',
            'chip' => 'M1',
            'origin' => 'Mỹ',
        ]);
        DB::table('product')->insert([
            'name' => 'Laptop MacBook Pro 14 M1 Max 2021 10-core CPU/32GB/512GB/24-core GPU (Z15G)',
            'manu_id' => 1,
            'type_id' => 1,
            'price' => 74900000,
            'description' => 'Khoác lên mình vẻ ngoài mới lạ so với các dòng Mac trước đó, thiết kế màn hình tai thỏ ấn tượng, bắt mắt cùng bộ hiệu năng đỉnh cao M1 Max mạnh mẽ, MacBook Pro 14 inch M1 Max 2021 xứng tầm là chiếc laptop cao cấp chuyên dụng dành cho dân kỹ thuật - đồ họa, sáng tạo nội dung.',
            'feature' => 1,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '32 GB',
            'Dung_Luong' => '512 GB',
            'HDH' => 'Mac OS',
            'chip' => 'M1',
            'origin' => 'Mỹ',
        ]);
        DB::table('product')->insert([
            'name' => 'Laptop HP EliteBook X360 1040 G8 i7 1165G7/16GB/512GB/Touch/Pen/Win10 Pro (3G1H4PA)',
            'manu_id' => 4,
            'type_id' => 1,
            'price' => 46890000,
            'description' => 'Đẳng cấp và ấn tượng hơn bao giờ hết cùng laptop HP EliteBook X360 1040 G8 i7 (3G1H4PA) với thiết kế sang trọng, bản lề gập xoay 360 độ cùng khả năng vận hành và xử lý mọi tác vụ mạnh mẽ mang đến những trải nghiệm trọn vẹn, khó quên cho người dùng.',
            'feature' => 1,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '16 GBLPDDR4X (On board)4267 MHz',
            'Dung_Luong' => '512 GB',
            'HDH' => 'Windows 10 Pro',
            'chip' => ' Intel® Core™ i5-1135G7 processor',
            'origin' => 'Mỹ',
        ]);
        DB::table('product')->insert([
            'name' => 'Laptop HP 240 G8 i5 1135G7/8GB/512GB/Win10 (518V7PA)',
            'manu_id' => 4,
            'type_id' => 1,
            'price' => 17980000,
            'description' => 'Với thiết kế hiện đại, bền bỉ cùng hiệu năng vượt trội đến từ con chip Intel Gen 11 tân tiến, HP 240 G8 i5 (518V7PA) tự tin đáp ứng tốt các nhu cầu học tập, làm việc và giản trí cơ bản hàng ngày của bạn.',
            'feature' => 0,
            'quantity' => 1,
            'status' => 1,
            'image' => ' ',
            'Gram' => '8 GBDDR4 2 khe (1 khe 8GB + 1 khe rời)3200 MHz',
            'Dung_Luong' => '512 GB',
            'HDH' => 'Windows 10 Home SL',
            'chip' => ' Intel® Core™ i5-1135G7 processor',
            'origin' => 'Mỹ',
        ]);
        DB::table('product')->insert([
            'name' => 'Laptop Asus VivoBook A415EA i3 1125G4/8GB/512GB/Win11 (EB1748W)',
            'manu_id' => 5,
            'type_id' => 1,
            'price' => 14990000,
            'description' => 'Laptop Asus VivoBook A415EA i3 (EB1748W) mang vẻ ngoài sang trọng, thanh lịch cùng hiệu năng ổn định đến từ con chip Intel thế hệ 11 tân tiến đáp ứng tốt mọi tác vụ văn phòng, học tập và giải trí cơ bản của người dùng.',
            'feature' => 0,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '8 GB',
            'Dung_Luong' => '512 GB',
            'HDH' => 'Windows 11 Home SL',
            'chip' => 'A415EA i3',
            'origin' => 'Đài Loan',
        ]);
        DB::table('product')->insert([
            'name' => 'Laptop Asus ZenBook UX482EA i5 1135G7/8GB/512GBTouch/Pen/Túi/Stand/Win11 (KA397W)',
            'manu_id' => 5,
            'type_id' => 1,
            'price' => 32990000,
            'description' => 'Laptop Asus ZenBook UX482EA i5 1135G7 (KA397W) sở hữu thiết kế thời thượng cùng hiệu năng mạnh mẽ, xứng danh bạn đồng hành lý tưởng trên chặng đường sáng tạo của người dùng.',
            'feature' => 1,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '8 GB',
            'Dung_Luong' => '512 GB',
            'HDH' => 'Windows 11 Home SL',
            'chip' => 'A415EA i5',
            'origin' => 'Đài Loan',
        ]);
        DB::table('product')->insert([
            'name' => 'Apple Watch S6 LTE 40mm viền nhôm dây silicone',
            'manu_id' => 1,
            'type_id' => 3,
            'price' => 8990000,
            'description' => 'Kiểu dáng thời thượng đi cùng sắc hồng nữ tính, trẻ trung
            Apple Watch S6 LTE 40mm viền nhôm dây cao su hồng được trang bị khung viền nhôm và mặt kính Ion-X strengthened glass bền bỉ và cứng cáp, chịu lực tốt, cho bạn thoải mái vận động, không ngại những va đập thường ngày. Dây đeo cao su không thấm nước, êm nhẹ, cho bạn cảm giác dễ chịu suốt ngày dài.',
            'feature' => 1,
            'quantity' => 1,
            'image' => ' ',
            'status' => 1,
            'Gram' => '4 GB',
            'Dung_Luong' => '64 GB',
            'HDH' => 'Mac OS',
            'chip' => 'M1',
            'origin' => 'My',
        ]);
    }
}
