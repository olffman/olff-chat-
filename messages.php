<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html><head><title>Messages - Olff Chat</title></head><body>
<nav>
  <a href="home.php">Home</a> |
  <a href="messages.php">Messages</a> |
  <a href="video.php">Video Watch</a> |
  <a href="settings.php">Settings</a> |
  <a href="profile.php">Profile</a> |
  <a href="logout.php">Logout</a>
</nav>
<h2>Your Messages</h2>
<p>Messages feature coming soon...</p>
</body></html>