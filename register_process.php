<?php 
include('connect.php');
session_start();

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

// Pengecekan apakah username atau email sudah terdaftar
$query = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika username atau email sudah terdaftar
    header("Location: login.php?message=username or email already registered");
    exit();
}

// Pengecekan panjang password
if (strlen($password) < 8) {
    header("Location: register.php?message=password must be at least 8 characters");
    exit();
}

// Enkripsi password sebelum disimpan ke database
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Jika semua validasi lolos, masukkan data ke dalam database
$insertquery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$insertstmt = $connect->prepare($insertquery);
$insertstmt->bind_param("sss", $username, $email, $hashedPassword);
$insertstmt->execute();

// Redirect ke dashboard jika registrasi berhasil
$_SESSION["username"] = $username;
header("Location: dashboard.php");
exit();
?>
