<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
?>
<!DOCTYPE html>
<html><head><title>Olff Chat Login</title></head><body>
<h2>Login</h2>
<form method="post" action="login_process.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
<p>New user? <a href="register.php">Register here</a></p>
</body></html>