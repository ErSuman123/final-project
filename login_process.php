<?php
include('includes/db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "Login info saved successfully.";
} else {
    echo "Error: " . $conn->error;
}
?>
