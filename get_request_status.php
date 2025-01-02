<?php
header('Content-Type: application/json');
include 'db.php';

$name = $_POST['name'];

$query = "SELECT status, date FROM help_requests WHERE name='$name' ORDER BY date DESC LIMIT 2";
$result = mysqli_query($conn, $query);

$statusList = [];
while ($row = mysqli_fetch_assoc($result)) {
    $statusList[] = ['status' => $row['status'], 'date' => $row['date']];
}

if (!empty($statusList)) {
    echo json_encode(['statusList' => $statusList]);
} else {
    echo json_encode(['statusList' => [['status' => 'Tidak ada permintaan bantuan ditemukan', 'date' => '']]]);
}

mysqli_close($conn);
?>