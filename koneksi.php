<?php 
$koneksi = mysqli_connect("localhost", "root", "", "portofolio");

if (mysqli_connect_errno()) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>