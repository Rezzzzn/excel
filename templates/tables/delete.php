<?php
// Include file koneksi database
include 'koneksi.php';

// Periksa apakah ID dikirim melalui GET
if (isset($_GET['id'])) {
    // Ambil ID dari parameter GET
    $id = $_GET['id'];

    // Validasi data (opsional)
    if (empty($id)) {
        echo "ID is required!";
        exit;
    }

    // Query untuk menghapus data
    $sql = "DELETE FROM crud_table WHERE id = ?";

    // Siapkan statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind parameter ke statement
    $stmt->bind_param('i', $id);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Redirect kembali ke halaman utama dengan pesan sukses
        header("Location: ../index.php?success=Data deleted successfully");
        exit;
    } else {
        echo "Error deleting data: " . $conn->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>
