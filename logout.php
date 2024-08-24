<?php
session_start();

// Clear the session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Prevent caching of the previous page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect to the login page
header("Location: index.php");
exit();
?>
