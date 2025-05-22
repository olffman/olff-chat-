<?php
session_start();
require 'db.php';
if(!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
$user_id = $_SESSION['user_id'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $full_name = $_POST['full_name'];
    $stmt = $conn->prepare("UPDATE users SET full_name=? WHERE id=?");
    $stmt->bind_param("si", $full_name, $user_id);
    $stmt->execute();
    $stmt->close();
    $message = "Settings updated.";
}

$stmt = $conn->prepare("SELECT full_name FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($full_name);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html><head><title>Settings - Olff Chat</title></head><body>
<nav>
  <a href="home.php">Home</a> |
  <a href="messages.php">Messages</a> |
  <a href="video.php">Video Watch</a> |
  <a href="settings.php">Settings</a> |
  <a href="profile.php">Profile</a> |
  <a href="logout.php">Logout</a>
</nav>
<h2>Settings</h2>
<?php if(isset($message)) echo "<p>$message</p>"; ?>
<form method="post" action="settings.php">
    Full Name: <input type="text" name="full_name" value="<?php echo htmlspecialchars($full_name); ?>" required><br>
    <button type="submit">Save</button>
</form>
</body></html>