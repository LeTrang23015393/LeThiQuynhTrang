
CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO users (username, password, full_name, email)
VALUES
    ('admin', 'Admin@123', 'Quản trị viên', 'admin@example.com'),
    ('user01', 'User@123', 'Nguyễn Văn An', 'an@example.com'),
    ('user02', 'User@456', 'Trần Thị Bình', 'binh@example.com');

-- Bước 6: Kiểm tra dữ liệu đã thêm
SELECT * FROM users;
