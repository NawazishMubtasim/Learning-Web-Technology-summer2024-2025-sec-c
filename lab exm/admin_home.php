<?php
include "db.php";
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != "Admin") {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
</head>
<body>
    <h2>Welcome <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <a href="profile.php">Profile</a><br>
    <a href="change_password.php">Change Password</a><br>
    <a href="view_users.php">View Users</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>
