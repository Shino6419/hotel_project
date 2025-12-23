# Hotel Project

Dự án quản lý khách sạn xây dựng bằng Laravel.

## Hướng dẫn cài đặt

### 1. Yêu cầu hệ thống

-   **XAMPP**: Cài đặt XAMPP (bao gồm PHP, Apache, MySQL)
-   **Composer**: Cài đặt Composer để quản lý dependencies của PHP

### 2. Cấu hình cơ sở dữ liệu

-   Chỉnh sửa file `.env` để cập nhật thông tin kết nối database của bạn
-   Import database từ file `database/hotel.sql` vào MySQL
-   Bật dịch vụ SQL và Apache trên XAMPP

### 3. Cài đặt dependencies

-   Chạy `composer install` để cài đặt các dependencies của PHP
-   Chạy `npm install` để cài đặt các dependencies của JavaScript
-   Chạy `npm run build` để build các assets

### 4. Chạy ứng dụng

-   Sử dụng lệnh `php artisan serve` để tạo địa chỉ host và chạy máy chủ phát triển

## Web đã Deploy

Ứng dụng đã được triển khai tại: **https://sendavilla.totalh.net/**

## Lưu ý

Đảm bảo tất cả các dịch vụ cần thiết đang hoạt động trước khi chạy ứng dụng.
