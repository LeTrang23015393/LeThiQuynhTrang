# Bài tập Buổi 17 - PHP Session và MySQL

## Bài 1: Form đăng nhập với Session

### Cấu trúc thư mục
```
bai1/
├── login.html           # Giao diện form đăng nhập
├── process_login.php    # Xử lý đăng nhập
├── success.php          # Trang đăng nhập thành công
└── logout.php           # Xử lý đăng xuất
```

### Tài khoản mặc định
- **Username:** admin
- **Password:** Admin@123

### Tính năng
- ✓ Form đăng nhập với phương thức POST
- ✓ Kiểm tra dữ liệu đầu vào (không để trống)
- ✓ Xác thực tài khoản với dữ liệu cố định
- ✓ Sử dụng Session để lưu trạng thái đăng nhập
- ✓ Bảo vệ trang success.php (chỉ truy cập khi đã đăng nhập)
- ✓ Chức năng đăng xuất
- ✓ Giao diện đẹp với CSS

### Hướng dẫn sử dụng
1. Copy thư mục `bai1` vào `C:\xampp\htdocs\`
2. Khởi động Apache trong XAMPP
3. Truy cập: `http://localhost/bai1/login.html`
4. Đăng nhập với tài khoản admin/Admin@123

---

## Bài 2: Kết nối MySQL

### Cấu trúc thư mục
```
bai_mysql_users/
├── db.php                  # File kết nối database
├── test_connection.php     # Kiểm tra kết nối
├── list_users.php          # Hiển thị danh sách users
└── create_database.sql     # Script tạo database và bảng
```

### Cơ sở dữ liệu
- **Database:** ltweb_users
- **Bảng:** users
- **Charset:** utf8mb4

### Cấu trúc bảng users
| Trường     | Kiểu dữ liệu    | Ghi chú              |
|------------|-----------------|----------------------|
| id         | INT UNSIGNED    | Khóa chính, tự tăng  |
| username   | VARCHAR(50)     | Không trùng          |
| password   | VARCHAR(255)    | Lưu mật khẩu         |
| full_name  | VARCHAR(100)    | Họ tên               |
| email      | VARCHAR(100)    | Không trùng          |
| created_at | TIMESTAMP       | Ngày tạo             |

### Hướng dẫn cài đặt

#### Bước 1: Khởi động XAMPP
1. Mở XAMPP Control Panel
2. Start **Apache** và **MySQL**

#### Bước 2: Tạo cơ sở dữ liệu
1. Truy cập: `http://localhost/phpmyadmin`
2. Chọn tab **SQL**
3. Copy nội dung file `create_database.sql` và chạy
4. Hoặc chạy từng lệnh SQL theo hướng dẫn

#### Bước 3: Kiểm tra kết nối
1. Copy thư mục `bai_mysql_users` vào `C:\xampp\htdocs\`
2. Truy cập: `http://localhost/bai_mysql_users/test_connection.php`
3. Nếu thành công, sẽ hiển thị thông tin kết nối

#### Bước 4: Xem danh sách users
1. Truy cập: `http://localhost/bai_mysql_users/list_users.php`
2. Sẽ hiển thị 3 user mẫu đã thêm

### Dữ liệu mẫu
| Username | Password  | Họ tên          | Email              |
|----------|-----------|-----------------|-------------------|
| admin    | Admin@123 | Quản trị viên   | admin@example.com |
| user01   | User@123  | Nguyễn Văn An   | an@example.com    |
| user02   | User@456  | Trần Thị Bình   | binh@example.com  |

### Lưu ý
- Đảm bảo MySQL đang chạy trong XAMPP
- Mật khẩu MySQL mặc định là rỗng (root/không có password)
- Nếu thay đổi cấu hình MySQL, cập nhật trong file `db.php`

---

## Yêu cầu hệ thống
- XAMPP (Apache + MySQL + PHP)
- Trình duyệt web hiện đại
- PHP 7.0 trở lên

## Tác giả
Mã sinh viên: 23015393
