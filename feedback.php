<?php
include("connection.php");

session_start();

//login status check and page redirrect 
include("guard_admin.php"); 

$result = mysqli_query($conn, "SELECT * FROM user_feedback");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback - Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #fff8e1, #ffffff);
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #f9a825;
            margin-bottom: 30px;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #fbc02d;
            color: #000;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            color: #333;
        }

        tr:hover {
            background-color: #fffde7;
        }

        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .back-button a {
            text-decoration: none;
            background-color: #f9a825;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            font-size: 16px;
            transition: 0.3s ease;
        }

        .back-button a:hover {
            background-color: #f57f17;
        }
    </style>
</head>
<body>

    <h2>🗣 User Feedback</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Message</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['message'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div class="back-button">
        <a href="admin_page.php">🔙 Back to Dashboard</a>
    </div>

</body>
</html>
