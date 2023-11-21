<?php
session_start();

session_unset();
session_destroy();

header("Location: /HackMAIT/login.php"); // Redirect to welcome.php or any other appropriate page
exit;
?>
