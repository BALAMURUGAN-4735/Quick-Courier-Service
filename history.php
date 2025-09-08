<?php

session_start();

//login status check and page redirrect 
include("guard_user.php"); 


$conn = new mysqli("localhost", "root", "", "courier_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user'])) {
    $current_page = basename($_SERVER['PHP_SELF']);
    header("Location: login.php?redirect=$current_page");
    exit();
}

// ⛔ Redirect to login if not logged in
if (!isset($_SESSION['user'])) {
    echo "<script>alert('❌ Please login first!'); window.location.href='login.php';</script>";
    exit();
}

$user_email = $_SESSION['user'];

// 🔍 Fetch only shipments that belong to the logged-in user
$sql = "SELECT * FROM shipments WHERE sender_email = '$user_email' ORDER BY created_at DESC";
$result = $conn->query($sql);

echo "<h2>Your Shipment History</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Shipment ID</th>
                <th>Receiver Name</th>
                <th>Receiver Pincode</th>
                <th>Parcel Type</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['shipment_id']}</td>
                <td>{$row['receiver_name']}</td>
                <td>{$row['receiver_pincode']}</td>
                <td>{$row['parcel_type']}</td>
                <td>" . htmlspecialchars($row['status']) . "</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "📭 You have no shipment history.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shipments</title>
    <style>
        a:hover {
            background: #233549ff;
            color: #9bbcddff;
        }
        a {
              display: inline-block;
            background-color: teal;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            margin: 20px auto;
            text-align: center;
            transition: 0.3s;
        }
    </style>
</head>
<body>
    <a href="user_page.php">Back to Home</a>
</body>
</html>
