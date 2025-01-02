<?php
header('Content-Type: application/json');
include 'db.php';

// Get status emergency
$query = "SELECT status FROM emergency_notifications WHERE id=1";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['success' => true, 'status' => $row['status']]);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal mengambil status emergency: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>