<?php
include "db.php";
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != "Admin") {
    header("Location: login.html");
    exit;
}

$sql = "SELECT id, username, usertype FROM users";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
</head>
<body>
    <h2>All Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>User Type</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['usertype']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="admin_home.php">Go Home</a>
</body>
</html>
