<?php
// Koneksi ke database
include 'koneksi.php';

// Header untuk file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_table.xls");
header("Cache-Control: max-age=0");

// Ambil data dari database
$result = $conn->query("SELECT id, name, number FROM crud_table");

// Buat header kolom untuk file Excel
echo "ID\tName\tNumber\n";

// Loop untuk menulis data ke file Excel
while ($row = $result->fetch_assoc()) {
    echo "{$row['id']}\t{$row['name']}\t{$row['number']}\n";
}

$conn->close();
exit;
?>
