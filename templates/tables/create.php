<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $number = $_POST['number'];

    // Query untuk menambahkan data
    $sql = "INSERT INTO crud_table (name, number) VALUES ('$name', '$number')";

    if ($conn->query($sql)) {
        header("Location: simple.php"); // Redirect kembali ke halaman utama
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
