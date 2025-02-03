<?php
include "koneksi.php";
$nama = $_POST['nama'];
$email = $_POST['email'];
$subjek = $_POST['subjek'];
$pesan = $_POST['pesan'];

$result = mysqli_query ($koneksi, "INSERT INTO pesan (nama, email, subjek, pesan) VALUES ('$nama', '$email', '$subjek', '$pesan')");
if ($result) {
	echo "<script>alert('Input pesan Berhasil!!');
	window.location.replace('index.html');
	</script>";
} else {
	echo "<script>alert('Input pesan gagal');
	</script>";
}
?>