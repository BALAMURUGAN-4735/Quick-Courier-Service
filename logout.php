<?php
session_start();

// Message store பண்ணுது
$_SESSION['logout_msg'] = "⏳ Your session has expired. Please login again.";

// Session data clear பண்ணினாலும் message மட்டும் வைத்துக்கணும்
foreach ($_SESSION as $key => $value) {
    if ($key !== 'logout_msg') {
        unset($_SESSION[$key]);
    }
}

header("Location: login.php");
exit();
?>
