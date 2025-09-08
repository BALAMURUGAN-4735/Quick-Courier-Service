<?php

session_start();
include("guard_user.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "courier_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate unique shipment ID
    $shipment_id = "SHIP" . time();
    $bill_id= "BILL" . time();

    // Get form data
    $sender_name      = $_POST['sender_name'];
    $sender_mobile    = $_POST['sender_mobile'];
    $sender_address   = $_POST['sender_address'];
    $receiver_name    = $_POST['receiver_name'];
    $receiver_mobile  = $_POST['receiver_mobile'];
    $receiver_address = $_POST['receiver_address'];
    $receiver_pincode = $_POST['receiver_pincode'];
    $parcel_type      = $_POST['parcel_type'];
    $weight           = $_POST['weight'];
    $distance_km      = $_POST['distance_km'];

    // Calculate amount
    $rate_per_km = 5;
    $rate_per_kg = 5;
    $amount = ($distance_km * $rate_per_km) + ($weight * $rate_per_kg);
    $payment_status = "Pending";

    // Insert into shipments table
    $sql1 ="INSERT INTO shipments 
        (shipment_id, sender_name, sender_mobile, sender_address, receiver_name, receiver_mobile, receiver_address, receiver_pincode, parcel_type, weight, distance_km) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("sssssssssdd", $shipment_id, $sender_name, $sender_mobile, $sender_address, $receiver_name, $receiver_mobile, $receiver_address, $receiver_pincode, $parcel_type, $weight, $distance_km);
    $stmt1->execute();

    // Insert into billing table
    $sql2 ="INSERT INTO billing (bill_id, shipment_id, sender_address, receiver_address, distance_km, amount, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt2= $conn->prepare($sql2);
    $stmt2->bind_param("ssssdds", $bill_id, $shipment_id, $sender_address, $receiver_address, $distance_km, $amount, $payment_status);
    $stmt2->execute();

    $stmt1->close();
    $stmt2->close();
    $conn->close();

    // Show success popup with view bill button
    echo "<script>
        alert('✅ Shipment Created Successfully!\\nShipment ID: $shipment_id\\nBill ID:$bill_id');
        if(confirm('Do you want to view your bill?')){
            window.location.href = 'view_bill.php?shipment_id=$shipment_id';
        } else {
            window.location.href = 'user_page.php';
        }
    </script>";
}
?>
<html>
<head>
    <title>Ship Now</title>
	<style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 0;
			background-color:lightseagreen;

        }
        .ship{
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .parceltype{
            border: 1px solid #ccc;
            border-radius: 5px;
            text: align left 50px !important;

        }
        .parceltype checkbox{
            margin-left: 10px;
            padding: 10px;
            margin-top: 5px;
        
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #2c3e50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #34495e;
        }
        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #2c3e50;
            text-decoration: none;
        }
        select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="ship">
    <h1>Ship Your Parcel</h1>
    <form action="ship.php" method="POST">
    <label for="sname">Sender Name:</label><br>
    <input type="text" name="sender_name" id="sname" required><br><br>

    <label for="smobile">Sender Mobile Number:</label><br>
    <input type="tel" name="sender_mobile" id="smobile" required><br><br>

    <label for="saddress">Sender Address:</label><br>
    <textarea name="sender_address" id="saddress" required></textarea><br><br>

    <label for="rname">Receiver Name:</label><br>
    <input type="text" name="receiver_name" id="rname" required><br><br>

    <label for="rmobile">Receiver Mobile Number:</label><br>
    <input type="text" name="receiver_mobile" id="rmobile" required><br><br>

    <label for="raddress">Receiver Address:</label><br>
    <textarea name="receiver_address" id="raddress" required></textarea><br><br>

    <label for="rpincode">Receiver Pincode:</label><br>
    <input type="text" name="receiver_pincode" id="rpincode" pattern="\d{6}" maxlength="6" required><br><br>

    <label for="parceltype">Parcel Type:</label><br>
    <select name="parcel_type" required>
        <option value="" disabled selected>-- Select your type --</option>
        <option value="document">Document</option>
        <option value="box">Box</option>
        <option value="fragile">Fragile Item</option>
        <option value="electronics">Electronics</option>
    </select><br>

    <label for="weight">Weight (kg):</label>
    <input type="number" name="weight" id="weight" step="0.01" required>

    <label for="distance">Distance (km):</label>
    <input type="number" name="distance_km" id="distance" step="0.01" required><br><br>

    <button type="submit" name="submit">Ship Now</button>
</form>
    <a href="user_page.php">Back to Home</a>
	</div>
</body>
</html>
