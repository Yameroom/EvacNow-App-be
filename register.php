<?php
header('Content-Type: application/json');
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Cek apakah email sudah terdaftar
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    echo json_encode(['success' => false, 'message' => 'Email sudah terdaftar']);
} else {
    // Hash password sebelum menyimpan ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertQuery = "INSERT INTO users (nama, email, password) VALUES ('$name', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $insertQuery)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Registrasi gagal']);
    }
}
?>
