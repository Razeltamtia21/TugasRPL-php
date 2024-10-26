<?php
session_start();
include('connect.php');

// Ambil data dari form reset password
$username = $_POST["username"];
$newPassword = $_POST["password"];
$confirmPassword = $_POST["password_confirm"];

// Cek apakah username terdaftar di database
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Jika username ditemukan
if ($result->num_rows === 1) {
    // Cek apakah password baru dan konfirmasi password sama
    if ($newPassword !== $confirmPassword) {
        header("Location: reset_password.php?message=password and confirmation do not match");
        exit();
    }

    // Cek panjang password
    if (strlen($newPassword) < 8) {
        header("Location: reset_password.php?message=password must be at least 8 characters");
        exit();
    }

    // Hash password baru
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update password di database
    $updateQuery = "UPDATE users SET password = ? WHERE username = ?";
    $updateStmt = $connect->prepare($updateQuery);
    $updateStmt->bind_param("ss", $hashedPassword, $username);
    $updateStmt->execute();

    // Redirect ke halaman login setelah reset berhasil
    header("Location: login.php?message=password has been reset successfully");
    exit();
} else {
    // Jika username tidak ditemukan
    header("Location: register.php?message=username not found");
    exit();
}
?>
