<?php
session_start();

$conn = new mysqli("localhost", "root", "", "courier_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//login status check and page redirrect 
include("guard_user.php"); 

$message = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shipment_id = $_POST['shipment_id'];
    $user_email = $_SESSION['user'];

    $sql = "UPDATE shipments 
            SET status = 'Cancelled' 
            WHERE shipment_id = '$shipment_id' AND sender_email = '$user_email'";

    if ($conn->query($sql) === TRUE) {
        if ($conn->affected_rows > 0) {
            $message = "✅ Shipment cancelled successfully.";
            $success = true;
        } else {
            $message = "❌ Invalid Shipment ID or not your shipment.";
        }
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cancel Shipment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightseagreen;
            margin: 0;
            padding: 0;
        }
        .cancel {
            width: 400px;
            margin: 80px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
        }
        h1 {
            color: #2c3e50;
        }
        input {
            width: 80%;
            padding: 10px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #c0392b;
        }
        a {
            display: block;
            margin-top: 15px;
            color: #2c3e50;
            text-decoration: none;
        }
        .msg {
            margin-top: 15px;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            background-color: <?php echo $success ? "#d4edda" : "#f8d7da"; ?>;
            color: <?php echo $success ? "#155724" : "#721c24"; ?>;
        }
    </style>
</head>
<body>
    <div class="cancel">
        <h1>Cancel Your Shipment</h1>
        <form method='POST' action='cancel.php'>
            <label>Enter Your Shipment ID:</label><br>
            <input type="text" name="shipment_id" placeholder="Shipment ID" required>
            <br>
            <button type="submit">Cancel Shipment</button>
        </form>

        <?php if (!empty($message)) { echo "<div class='msg'>$message</div>"; } ?>

        <a href="user_page.php">⬅ Back to Home</a>
    </div>
</body>
</html>
