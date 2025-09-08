<?php
include("connection.php");

$msg = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mobile_number = $_POST['mobile_number'];

    // Check if user already exists
    $select1 = "SELECT * FROM users WHERE email = '$email'";
    $select_user = mysqli_query($conn, $select1);

    if (mysqli_num_rows($select_user) > 0) {
        $msg = "❌ User already exists!";
    } else {
        // Insert new user
        $insert1 = "INSERT INTO users (name, email, user_type, username, password, mobile_number) 
                    VALUES ('$name', '$email', '$user_type', '$username', '$password', '$mobile_number')";
        if (mysqli_query($conn, $insert1)) {
            echo "<h3 style='color:green;'>✅ Registration successful! Redirecting to login page...</h3>";
            // Redirect after 3 seconds
            echo "<script>
                    setTimeout(function(){
                        window.location.href = 'login.php';
                    }, 3000);
                  </script>";
            exit();
        } else {
            $msg = "❌ Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Quick Courier</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: lightseagreen;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signup-box {
            background: white;
            padding: 30px 25px;
            width: 100%;
            max-width: 350px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            font-family: Arial, sans-serif;
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

        @media (max-height: 500px) {
            .signup-box {
                max-height: 90vh;
                overflow-y: auto;
            }
        }
    </style>
</head>
<body>
    <div class="signup-box">
        <form action="" method="POST">
            <h2>Register</h2>
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="user_type" required>
                <option  value="" disabled selected >-- Select your type --</option>
                <option value="user">User</option>
            </select>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="tel" name="mobile_number" placeholder="Mobile Number" required>
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <div class="link">
            <p>Already have an account? <a href="login.php">Login</a></p>
            <a href="bs.php">← Back to Home</a>
        </div>
    </div>
</body>
</html>
