<?php
header('Content-Type: application/json');
include 'db.php';

$id = $_POST['id'];

// Pastikan ID tidak kosong
if (empty($id)) {
    echo json_encode(['success' => false, 'message' => 'ID tidak boleh kosong']);
    exit;
}

// Query untuk menghapus permintaan bantuan
$deleteQuery = "DELETE FROM help_requests WHERE id='$id'";

if (mysqli_query($conn, $deleteQuery)) {
    echo json_encode(['success' => true, 'message' => 'Permintaan berhasil dihapus']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menghapus permintaan: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>