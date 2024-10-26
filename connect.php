
<!-- koneksi vsc ke database  -->

<?php 

$connect = mysqli_connect("localhost", "root", "", "kelas11");

if($connect->connect_error){
    die("Connection Failed " . $connect->connect_error);
}

?>