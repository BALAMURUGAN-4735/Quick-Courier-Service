<?php
session_start();

// Only for logged-in admins
if (!isset($_SESSION['admin'])) {
    $_SESSION['logout_msg'] = "⚠️ Please admin login to access this page.";
    $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}
?>
