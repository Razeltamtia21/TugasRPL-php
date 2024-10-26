<?php 
include('connect.php');
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$query = "SELECT * FROM users WHERE username = ? ";
$stmt = $connect->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    // Verifikasi password
    if (password_verify($password, $user["password"])) {
        // Jika password benar, simpan informasi pengguna dalam session
        $_SESSION["username"] = $user["username"];
        $_SESSION["email"] = $user["email"];
        // Redirect ke halaman dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Jika password salah
        header("Location: login.php?message=invalid password");
        exit();
    }
} else {
    // Jika username/email tidak ditemukan
    header("Location: register.php?message=username not found");
    exit();
}
?>

?>