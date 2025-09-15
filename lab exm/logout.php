<?php
include "db.php";

session_unset();
session_destroy();
setcookie("user", "", time() - 3600, "/");

header("Location: login.html");
exit;
?>
