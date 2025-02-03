<?php
$servername = "localhost";  // Nama host database
$username = "root";         // Username database
$password = "";             // Password database
$dbname = "portofolio";         // Nama database

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$subjek = $_POST['subjek'];
$pesan = $_POST['pesan'];

// Cegah SQL Injection
$nama = $conn->real_escape_string($nama);
$email = $conn->real_escape_string($email);
$subjek = $conn->real_escape_string($subjek);
$pesan = $conn->real_escape_string($pesan);

// Siapkan dan jalankan SQL
$sql = "INSERT INTO pesan(nama, email, subjek, pesan) VALUES ('$nama', '$email', '$subjek', '$pesan')";

if ($conn->query($sql) === TRUE) {
    // Tampilkan pesan sukses dan tombol kembali
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Success</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f4f4f4;
                margin: 0;
            }
            .success-container {
                background: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            .success-container button {
                background-color: #5cb85c;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            .success-container button:hover {
                background-color: #4cae4c;
            }
        </style>
    </head>
    <body>
        <div class='success-container'>
            <h1>PESAN BERHASIL DITAMBAHKAN</h1>
            <button onclick='window.location.href=\"index.html\"'>Kembali ke Halaman Utama</button>
        </div>
    </body>
    </html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>