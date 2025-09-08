<?php
include("connection.php");

session_start();

//login status check and page redirrect 
include("guard_admin.php"); 

$result = mysqli_query($conn, "SELECT * FROM shipments");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Shipments - Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e0f7fa, #ffffff);
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #00796b;
            margin-bottom: 30px;
        }

        table {
            width: 95%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #0097a7;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
            color: #333;
            text-align:center;
        }

        tr:hover {
            background-color: #f1fdfd;
        }

        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .back-button a {
            text-decoration: none;
            background-color: #00796b;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            font-size: 16px;
            transition: 0.3s ease;
        }

        .back-button a:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>

    <h2>📦 All Shipments</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Sender Name</th>
            <th>Sender Mobile</th>
            <th>Sender Address</th>
            <th>Receiver Name</th>
            <th>Receiver Mobile</th>
            <th>Receiver Address</th>
            <th>Parcel Type</th>
            <th>Shipment ID</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['sender_name'] ?></td>
            <td><?= $row['sender_mobile'] ?></td>
            <td><?= $row['sender_address'] ?></td>
            <td><?= $row['receiver_name'] ?></td>
            <td><?= $row['receiver_mobile'] ?></td>
            <td><?= $row['receiver_address'] ?></td>
            <td><?= $row['parcel_type'] ?></td>
            <td><?= $row['shipment_id'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div class="back-button">
        <a href="admin_page.php">🔙 Back to Dashboard</a>
    </div>

</body>
</html>
