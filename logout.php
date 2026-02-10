<?php
session_start();

session_destroy(); // Destroys all sessions

header("Location: login.php"); // Redirects the user to the login page
exit();
?>