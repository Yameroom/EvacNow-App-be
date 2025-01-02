<?php
header('Content-Type: application/json');
include 'db.php';

$id = $_POST['id'];
$status = $_POST['status'];

// Pastikan ID dan status tidak kosong
if (empty($id) || empty($status)) {
    echo json_encode(['success' => false, 'message' => 'ID atau status tidak boleh kosong']);
    exit;
}

// Query untuk memperbarui status permintaan bantuan
$updateQuery = "UPDATE help_requests SET status='$status' WHERE id='$id'";

if (mysqli_query($conn, $updateQuery)) {
    echo json_encode(['success' => true, 'message' => 'Status permintaan berhasil diperbarui']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal memperbarui status permintaan: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>