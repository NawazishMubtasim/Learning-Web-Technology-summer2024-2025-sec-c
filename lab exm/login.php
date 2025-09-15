<?php
include "db.php";

$username = trim($_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
$result = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['usertype'] = $row['usertype'];
        setcookie("user", $row['username'], time() + 3600, "/");

        if ($row['usertype'] == "Admin") {
            header("Location: admin_home.php");
        } else {
            header("Location: user_home.php");
        }
        exit;
    } else {
        echo "Invalid password! <a href='login.html'>Try again</a>";
    }
} else {
    echo "User not found! <a href='register.html'>Register here</a>";
}

mysqli_close($con);
?>
