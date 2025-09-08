<?php
session_start();

// ✅ Check submitted OTP
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['otp'])) {
    $entered_otp = $_POST['otp'];

    if ($entered_otp == $_SESSION['otp']) {
        $_SESSION['verified_user'] = $_SESSION['mobile_number']; // Store verified identity
        echo "<script>
            alert('✅ OTP Verified');
            window.location.href = 'reset_password.php';
        </script>";
        exit();
    } else {
        echo "<script>alert('❌ Invalid OTP. Try again.');</script>";
    }
}
?>

<html>
<head><title>Verify OTP</title>
    <style>
        body { font-family: Arial; background: #eef; text-align: center; padding-top: 100px; }
        .box { background: white; display: inline-block; padding: 30px; border-radius: 8px; }
        input { padding: 10px; width: 250px; margin: 10px 0; }
        button { padding: 10px 20px; }
    </style>
</head>
<body>
    <h2>Enter OTP</h2>
    <form method="post">
        <input type="text" name="otp" placeholder="Enter OTP" required><br><br>
        <button type="submit">Verify OTP</button>
    </form>
</body>
</html>
