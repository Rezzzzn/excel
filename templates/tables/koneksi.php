<?php
// Konfigurasi database
$host = 'localhost'; // Nama host (default: localhost)
$user = 'root';      // Username database (default: root untuk XAMPP)
$password = '';      // Password database (kosong untuk XAMPP)
$database = 'db_user'; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika koneksi berhasil
// echo "Koneksi berhasil!";
?>
