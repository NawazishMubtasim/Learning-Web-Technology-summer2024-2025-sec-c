<?php
include "db.php";
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != "User") {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Home</title>
</head>
<body>
    <h2>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <a href="profile.php">Profile</a><br>
    <a href="change_password.php">Change Password</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>
