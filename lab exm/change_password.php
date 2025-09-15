<?php
include "db.php";
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current = $_POST['current'];
    $new = $_POST['new'];
    $confirm = $_POST['confirm'];

    $username = $_SESSION['username'];

    $sql = "SELECT password FROM users WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!password_verify($current, $row['password'])) {
        echo "Current password incorrect!";
    } elseif ($new !== $confirm) {
        echo "New passwords do not match!";
    } else {
        $hashed_new = password_hash($new, PASSWORD_DEFAULT);
        $update = "UPDATE users SET password='$hashed_new' WHERE username='$username'";
        if (mysqli_query($con, $update)) {
            echo "Password changed successfully!";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h2>Change Password</h2>
    <form method="post" action="">
        Current Password: <input type="password" name="current" required><br><br>
        New Password: <input type="password" name="new" required><br><br>
        Retype New Password: <input type="password" name="confirm" required><br><br>
        <input type="submit" value="Change">
    </form>
    <a href="<?php echo ($_SESSION['usertype'] == 'Admin') ? 'admin_home.php' : 'user_home.php'; ?>">Home</a>
</body>
</html>
