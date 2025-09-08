<?php
session_start();

//login status check and page redirrect 
include("guard_user.php"); 

$username = isset($_SESSION['user']) ? $_SESSION['user'] : 'Guest';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            padding: 50px;
        }

        .feedback-box {
            background: white;
            padding: 30px;
            max-width: 500px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #34495e;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px 12px;
            margin-top: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 15px;
            box-sizing: border-box;
            transition: 0.3s ease;
        }

        textarea:focus,
        input:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        button[type="submit"] {
            margin-top: 25px;
            padding: 12px;
            width: 100%;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button[type="submit"]:hover {
            background: #2980b9;
        }

        .back-btn {
            display: block;
            width: 200px;
            margin: 30px auto 0;
            padding: 12px;
            text-align: center;
            background: #2ecc71;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #27ae60;
        }
    </style>
</head>
<body>
    <div class="feedback-box">
        <form action="submit_feedback.php" method="POST">
            <h2>🌟 Give Your Feedback</h2>

            <label>Your Name:</label>
            <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" readonly>

            <label>Message:</label>
            <textarea name="message" rows="4" placeholder="Enter your feedback..." required></textarea>

            <label>Star Rating:</label>
            <select name="rating" required>
                <option value="" disabled selected >-- Select --</option>
                <option value="1">⭐</option>
                <option value="2">⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
            </select>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>

    <a href="user_page.php" class="back-btn">⬅️ Back to Home</a>
</body>
</html>
