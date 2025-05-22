<?php
session_start();
require 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $full_name = $_POST['full_name'];
    $stmt = $conn->prepare("INSERT INTO users (username, password, full_name) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $full_name);
    if($stmt->execute()){
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html><head><title>Register - Olff Chat</title></head><body>
<h2>Register</h2>
<form method="post" action="register.php">
    Username: <input type="text" name="username" required><br>
    Full Name: <input type="text" name="full_name" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
<p>Already have an account? <a href="index.php">Login here</a></p>
</body></html>