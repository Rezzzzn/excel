<?php
require __DIR__ . '/../../../vendor/autoload.php';
include 'koneksi.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['import'])) {
    // Cek apakah file diunggah
    if (!isset($_FILES['excel_file']) || $_FILES['excel_file']['error'] !== UPLOAD_ERR_OK) {
        die("Error: File tidak ditemukan atau gagal diunggah.");
    }

    $file = $_FILES['excel_file']['tmp_name'];
    
    try {
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(null, true, true, true); // Konversi sheet ke array

        // Nama tabel yang benar
        $tableName = "crud_table";

        // Siapkan statement SQL
        $stmt = $conn->prepare("INSERT INTO $tableName (name, number) VALUES (?, ?)");

        // Mulai dari baris kedua untuk melewati header
        foreach ($data as $index => $row) {
            if ($index == 1) continue; // Lewati header (baris pertama)
            
            $name = isset($row['A']) ? trim($row['A']) : '';
            $number = isset($row['B']) ? trim($row['B']) : '';

            if (!empty($name) && !empty($number)) {
                $stmt->bind_param("ss", $name, $number);
                if ($stmt->execute()) {
                    echo "Data berhasil disimpan: $name - $number <br>";
                } else {
                    echo "Gagal menyimpan data: " . $stmt->error . "<br>";
                }
            }
        }

        $stmt->close();
        echo "<script>alert('Import Berhasil!'); window.location.href='simple.php';</script>";
    } catch (Exception $e) {
        die("Error saat membaca file: " . $e->getMessage());
    }
}
?>
