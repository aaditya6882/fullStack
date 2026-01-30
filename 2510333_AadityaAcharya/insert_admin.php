<?php
//require_once 'config/db.php';

$username = 'admin';
$password = password_hash('clinic123', PASSWORD_DEFAULT);
echo $password;
// $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
// $stmt->execute([$username, $password]);

// echo "Admin inserted successfully!";
?>
