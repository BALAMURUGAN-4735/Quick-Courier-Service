<?php

// Only for logged-in users (not admins)
if (!isset($_SESSION['user'])) {
    $_SESSION['logout_msg'] = "⚠️ Please user login to access this page.";
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}
?>
