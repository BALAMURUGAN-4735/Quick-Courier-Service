<?php
$conn = new mysqli("localhost", "root", "", "courier_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

//login status check and page redirrect 
include("guard_user.php"); 


$trackingData = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shipment_id = $_POST['shipment_id'];

    $stmt = $conn->prepare("SELECT * FROM shipments WHERE shipment_id = ?");
    $stmt->bind_param("s", $shipment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $trackingData = $result->fetch_assoc();
    } else {
        $error = "No shipment found with Shipment ID: $shipment_id";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Shipment</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f1f1f1;
            padding: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #aaa;
        }
        th {
            background-color: teal;
            color: white;
        }
        .cancelled {
            color: red;
            font-weight: bold;
        }
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

<h2>Track Your Shipment</h2>
<form method="POST">
    <label>Enter Your Shipment ID:</label>
    <input type="text" name="shipment_id" required>
    <input type="submit" value="Track">
</form>

<?php if ($error): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php elseif ($trackingData): ?>
    <?php if ($trackingData['status'] === 'Cancelled'): ?>
        <p class="cancelled">❌ This shipment has been cancelled.</p>
    <?php else: ?>
        <table>
            <tr><th>Shipment ID</th><td><?php echo $trackingData['shipment_id']; ?></td></tr>
            <tr><th>Sender Name</th><td><?php echo $trackingData['sender_name']; ?></td></tr>
            <tr><th>Sender Mobile</th><td><?php echo $trackingData['sender_mobile']; ?></td></tr>
            <tr><th>Receiver Name</th><td><?php echo $trackingData['receiver_name']; ?></td></tr>
            <tr><th>Receiver Mobile</th><td><?php echo $trackingData['receiver_mobile']; ?></td></tr>
            <tr><th>Receiver Address</th><td><?php echo $trackingData['receiver_address']; ?></td></tr>
            <tr><th>Parcel Type</th><td><?php echo $trackingData['parcel_type']; ?></td></tr>
            <tr><th>Status</th><td><?php echo $trackingData['status']; ?></td></tr>
            <tr><th>Created At</th><td><?php echo $trackingData['created_at']; ?></td></tr>
        </table>
    <?php endif; ?>
<?php endif; ?>
<a href="user_page.php">Back to Home</a>
</body>
</html>
