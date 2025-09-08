<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body { font-family: Arial; background: #eef; text-align: center; padding-top: 100px; }
        .box { background: white; display: inline-block; padding: 30px; border-radius: 8px; }
        input { padding: 10px; width: 250px; margin: 10px 0; }
        button { padding: 10px 20px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Forgot Password</h2>
        <form action="send_otp.php" method="POST">
            <input type="text" name="contact" placeholder="Enter Email or Mobile" required><br>
            <button type="submit">Send OTP</button>
        </form>
    </div>
</body>
</html>
