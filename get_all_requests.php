<?php
header('Content-Type: application/json');
include 'db.php';

// Hapus permintaan bantuan yang sudah lebih dari 2 hari dengan status "Tim penyelamat dalam perjalanan"
$deleteOldRequestsQuery = "DELETE FROM help_requests WHERE status='Tim penyelamat dalam perjalanan' AND date < NOW() - INTERVAL 2 DAY";
mysqli_query($conn, $deleteOldRequestsQuery);

// Urutkan berdasarkan status ASC, impact_scale DESC, dan date DESC
$query = "SELECT id, name, status, date, latitude, longitude, impact_scale FROM help_requests ORDER BY FIELD(status, 'Admin belum menyetujui', 'Tim penyelamat dalam perjalanan'), impact_scale DESC, date DESC";
$result = mysqli_query($conn, $query);

$statusList = [];
while ($row = mysqli_fetch_assoc($result)) {
    $statusList[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'status' => $row['status'],
        'date' => $row['date'],
        'latitude' => $row['latitude'],
        'longitude' => $row['longitude'],
        'impact_scale' => $row['impact_scale']
    ];
}

echo json_encode(['statusList' => $statusList]);

mysqli_close($conn);
?>