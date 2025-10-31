<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "12345"; // Nhập mật khẩu MySQL nếu có
$dbname = "user_database";

// Kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

// Mã hóa mật khẩu
$hashed_password = password_hash($pass, PASSWORD_BCRYPT);

// Thêm dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Đăng ký thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
