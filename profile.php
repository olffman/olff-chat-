<?php
session_start();
require 'db.php';
if(!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT username, full_name FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $full_name);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html><head><title>Profile - Olff Chat</title></head><body>
<nav>
  <a href="home.php">Home</a> |
  <a href="messages.php">Messages</a> |
  <a href="video.php">Video Watch</a> |
  <a href="settings.php">Settings</a> |
  <a href="profile.php">Profile</a> |
  <a href="logout.php">Logout</a>
</nav>
<h2>Your Profile</h2>
<p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
<p><strong>Full Name:</strong> <?php echo htmlspecialchars($full_name); ?></p>
</body></html>