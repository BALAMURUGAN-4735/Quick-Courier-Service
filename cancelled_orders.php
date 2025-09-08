<?php
include("connection.php");

session_start();

//login status check and page redirrect 
include("guard_admin.php"); 

$result = mysqli_query($conn, "SELECT * FROM shipments WHERE status = 'Cancelled'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cancelled Orders - Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #ffe0e0, #fff0f0);
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #c0392b;
            margin-bottom: 30px;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #435e70ff;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            color: #333;
            text-align:center;
        }

        tr:hover {
            background-color: #fdf2f2;
        }

        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .back-button a {
            text-decoration: none;
            background-color: #27ae60;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            font-size: 16px;
            transition: 0.3s ease;
        }

        .back-button a:hover {
            background-color: #338154ff;
        }
    </style>
</head>
<body>

    <h2>❌ Cancelled Orders</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Shipment ID</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['sender_name'] ?></td>
            <td><?= $row['receiver_name'] ?></td>
            <td><?= $row['shipment_id'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div class="back-button">
        <a href="admin_page.php">🔙 Back to Dashboard</a>
    </div>

</body>
</html>
