<?php
include "db.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

$username = $_SESSION['username'];
$sql = "SELECT id, username, usertype FROM users WHERE username='$username'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h2>Profile</h2>
    <p><b>ID:</b> <?php echo $row['id']; ?></p>
    <p><b>Name:</b> <?php echo $row['username']; ?></p>
    <p><b>User Type:</b> <?php echo $row['usertype']; ?></p>
    <a href="<?php echo ($_SESSION['usertype'] == 'Admin') ? 'admin_home.php' : 'user_home.php'; ?>">Go Home</a>
</body>
</html>
