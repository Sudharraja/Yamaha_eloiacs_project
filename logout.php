<?php
// Start or resume the session
session_start();

// Clear session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or another desired location
header("Location: https://aishwarryagroups.cloud/");
exit();
?>
