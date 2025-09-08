<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];
$initial = strtoupper(substr($username, 0, 1));
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="style.css"> <!-- Reuse same CSS -->
    <style>
        .profile-container {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            border-radius: 10px;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .profile-icon-big {
            width: 80px;
            height: 80px;
            background-color: brown;
            color: white;
            font-size: 36px;
            line-height: 80px;
            border-radius: 50%;
            margin: 0 auto 20px auto;
        }

        .profile-info {
            font-size: 18px;
            margin-top: 10px;
        }

        .btn-group {
            margin-top: 20px;
        }

        .btn-group a {
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #333;
            color: white;
            border-radius: 5px;
        }

        .btn-group a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <div class="profile-icon-big"><?php echo $initial; ?></div>
    <h2><?php echo ucfirst($username); ?>'s Profile</h2>

    <div class="profile-info">
        <p><strong>Username:</strong> <?php echo $username; ?></p>
        <p><strong>Email:</strong> yourmail@example.com</p> <!-- Replace with actual DB value if needed -->
        <p><strong>Member Since:</strong> August 2025</p> <!-- Replace with actual join date -->
    </div>

    <div class="btn-group">
        <a href="logout.php">🚪 Logout</a>
    </div>
</div>

</body>
</html>
