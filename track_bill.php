<?php
$conn = new mysqli("localhost", "root", "", "courier_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


session_start();

//login status check and page redirrect 
include("guard_user.php"); 


$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_id = trim($_POST['shipment_id']);

    // Search by Shipment ID OR Bill ID
    $sql = "SELECT shipment_id FROM billing WHERE shipment_id = '$input_id' OR bill_id = '$input_id' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $shipment_id = $row['shipment_id'];

        // Redirect to view_bill page with the correct shipment ID
        header("Location: view_bill.php?shipment_id=" . urlencode($shipment_id));
        exit();
    } else {
        $error = "❌ No bill found for this Shipment ID or Bill ID!";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Bill</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(to right, #56ccf2, #2f80ed);
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 520px;
            margin: auto;
            background: white;
            padding: 25px;
            margin-top: 60px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.2);
            border-radius: 10px;
        }
        h2 {
            color: #2f80ed;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            width: 65%;
            border: 1px solid #bbb;
            border-radius: 5px;
            margin-right: 5px;
            outline: none;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background: #2f80ed;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: #1f5fbf;
        }
        .home-btn {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 15px;
            background: #f39c12;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }
        .home-btn:hover {
            background: #d68910;
        }
        .error {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Track Your Bill</h2>
    <form method="POST">
        <input type="text" name="shipment_id" placeholder="Enter Shipment ID or Bill ID" required>
        <input type="submit" value="Check Bill">
    </form>
    <a class="home-btn" href="user_page.php">🏠 Back to Home</a>
    <?php if ($error) { echo "<p class='error'>$error</p>"; } ?>
</div>

</body>
</html>
