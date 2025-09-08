<?php
include("connection.php");
session_start();

if (isset($_SESSION['logout_msg'])) {
    echo "<script>alert('" . $_SESSION['logout_msg'] . "');</script>";
    unset($_SESSION['logout_msg']); // Remove after showing
}

if (isset($_POST['submit'])) {
    $user_input = $_POST['user_input']; // Can be email OR username
    $password = $_POST['password'];

    // Check both email or username in one query
    $select = "SELECT * FROM users WHERE (email = '$user_input' OR username = '$user_input') AND password = '$password'";
    $select_user = mysqli_query($conn, $select);

    if (mysqli_num_rows($select_user) > 0) {
        $row = mysqli_fetch_assoc($select_user);

        // Based on user_type
        if ($row['user_type'] == 'user') {
            $_SESSION['user'] = $row['email'];
            $_SESSION['id'] = $row['id'];

            // Redirect after login with alert
            if (isset($_SESSION['redirect_after_login'])) {
                $redirect = $_SESSION['redirect_after_login'];
                unset($_SESSION['redirect_after_login']); // loop avoid
                echo "<script>alert('✅ Login successful! Redirecting...'); window.location.href = '$redirect';</script>";
            } else {
                echo "<script>alert('✅ Login successful! Redirecting...'); window.location.href = 'user_page.php';</script>";
            }
            exit();

        } elseif ($row['user_type'] == 'admin') {
            $_SESSION['admin'] = $row['email'];
            $_SESSION['id'] = $row['id'];

            // Redirect after login with alert
            if (isset($_SESSION['redirect_after_login'])) {
                $redirect = $_SESSION['redirect_after_login'];
                unset($_SESSION['redirect_after_login']);
                echo "<script>alert('✅ Admin login successful! Redirecting...'); window.location.href = '$redirect';</script>";
            } else {
                echo "<script>alert('✅ Admin login successful! Redirecting...'); window.location.href = 'admin_page.php';</script>";
            }
            exit();
        }

    } else {
        echo "<script>alert('❌ Incorrect email/username or password!');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login - Quick Courier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
			background-color:lightseagreen;
        }
        .login-box {
            background: white;
            padding: 30px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }
        button {
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            background-color: #2c3e50;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #34495e;
        }
        .link {
            text-align: center;
            margin-top: 15px;
        }
        .link a {
            color: #2c3e50;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="login-box">
    <?php
    if (isset($_GET['timeout']) && $_GET['timeout'] == 1) {
        echo "<p style='color:red; text-align:center;'>⏰ You have been logged out due to inactivity.</p>";
    }
    ?>
        <form method="POST" action="">
            <h2>Login</h2>
            <input type="text" name="user_input" placeholder="Email or Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <p class="link">Forget your Password? <a href="forgot_password.php">Forgot Password</a></p>
            <button type="submit" name="submit">Login</button>
        </form>
        <div class="link">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            <a href="bs.php">← Back to Home</a>
        </div>
    </div>
</div>
</body>
</html>
