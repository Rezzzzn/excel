<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Header JSON untuk response
    header('Content-Type: application/json');

    // Validasi input
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['number'])) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit;
    }

    $id = $_POST['id'];
    $name = $_POST['name'];
    $number = $_POST['number'];

    // Koneksi ke database
    include 'koneksi.php';

    try {
        // Prepared statement untuk mengupdate data
        $sql = "UPDATE crud_table SET name = ?, number = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $conn->error);
        }

        // Binding parameters (s = string, i = integer)
        $stmt->bind_param("ssi", $name, $number, $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Data updated successfully.']);
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Return error message as JSON
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>
