<?php
include "db.php";

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$usertype = $_POST['usertype'];

if ($username == "" || $email == "" || $password == "" || $confirm_password == "" || $usertype == "") {
    echo "All fields are required! <a href='register.html'>Go back</a>";
    exit;
}

if ($password !== $confirm_password) {
    echo "Passwords do not match! <a href='register.html'>Go back</a>";
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password, email, usertype) VALUES ('$username', '$hashed_password', '$email', '$usertype')";

if (mysqli_query($con, $sql)) {
    echo "Registration successful! <a href='login.html'>Login here</a>";
} else {
    echo "Error: " . mysqli_error($con) . " <a href='register.html'>Try again</a>";
}

mysqli_close($con);
?>
