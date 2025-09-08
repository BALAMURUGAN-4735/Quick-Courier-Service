<?php
session_start();
include("connection.php");

if (!isset($_SESSION['verified_user'])) {
    echo "<script>
        alert('❌ Access denied. Please verify OTP first.');
        window.location.href='forgot_password.php';
    </script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $identifier = $_SESSION['verified_user'];

        $query = "UPDATE users SET password='$hashed_password' WHERE mobile_number='$identifier' OR email='$identifier'";

        if (mysqli_query($conn, $query)) {
            session_unset();
            session_destroy();

            echo "<script>
                alert('✅ Password updated successfully.');
                window.location.href='login.php';
            </script>";
        } else {
            echo "<script>alert('❌ Failed to update password.');</script>";
        }
    } else {
        echo "<script>alert('❌ Passwords do not match.');</script>";
    }
}
?>

<html>
<head><title>Reset Password</title></head>
<body>
    <h2>Reset Your Password</h2>
    <form method="post">
        <input type="password" name="new_password" placeholder="New Password" required><br><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>
        <button type="submit">Update Password</button>
    </form>
</body>
</html>
