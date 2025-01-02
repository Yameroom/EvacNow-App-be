<?php
header('Content-Type: application/json');
include 'db.php';

$name = $_POST['name'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$date = $_POST['date'];
$status = $_POST['status'];
$impact_scale = $_POST['impact_scale']; // Tambahkan ini

// Query untuk menyimpan data ke tabel help_requests
$insertQuery = "INSERT INTO help_requests (name, latitude, longitude, date, status, impact_scale) VALUES ('$name', '$latitude', '$longitude', '$date', '$status', '$impact_scale')";

if (mysqli_query($conn, $insertQuery)) {
    echo json_encode(['success' => true, 'message' => 'Permintaan bantuan berhasil dikirim']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal mengirim permintaan bantuan: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>