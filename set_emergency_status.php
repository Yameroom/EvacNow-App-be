<?php
header('Content-Type: application/json');
include 'db.php';

$status = $_POST['status'];

if ($status !== 'active' && $status !== 'inactive') {
    echo json_encode(['success' => false, 'message' => 'Status tidak valid']);
    exit;
}

// Update status emergency
$query = "UPDATE emergency_notifications SET status='$status', created_at=NOW() WHERE id=1";
if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true, 'message' => 'Status emergency berhasil diperbarui']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal memperbarui status emergency: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>