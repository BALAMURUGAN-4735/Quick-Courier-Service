<?php 
$conn = new mysqli("localhost", "root", "", "courier_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

//login status check and page redirrect 
include("guard_user.php"); 


$bill = null;
if (isset($_GET['shipment_id'])) {
    $shipment_id = $_GET['shipment_id']; 

    $sql = "SELECT s.*, b.bill_id, b.amount, b.payment_status 
            FROM shipments s 
            JOIN billing b ON s.shipment_id = b.shipment_id 
            WHERE s.shipment_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $shipment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $bill = $result->fetch_assoc();
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Invoice</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding-top: 50px;
    }

    .invoice {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        width: 450px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        border-top: 5px solid #3498db;
    }

    h2 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    p {
        font-size: 15px;
        margin: 8px 0;
        border-bottom: 1px solid #f0f0f0;
        padding-bottom: 5px;
    }

    strong {
        color: #34495e;
    }

    .download-btn {
        display: block;
        width: 100%;
        text-align: center;
        background: #3498db;
        color: white;
        padding: 10px;
        border-radius: 5px;
        margin-top: 20px;
        text-decoration: none;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    .download-btn:hover {
        background: #2980b9;
    }

    .no-invoice {
        text-align: center;
        color: red;
        font-weight: bold;
    }
</style>
</head>
<body>

<div class="invoice">
    <h2>📦 Courier Service Invoice</h2>
    <?php if ($bill) { ?>
        <p><strong>Billing ID:</strong> <?= htmlspecialchars($bill['bill_id']) ?></p>
        <p><strong>Shipment ID:</strong> <?= htmlspecialchars($bill['shipment_id']) ?></p>
        <p><strong>Sender:</strong> <?= htmlspecialchars($bill['sender_name']) ?>, <?= htmlspecialchars($bill['sender_mobile']) ?></p>
        <p><strong>Receiver:</strong> <?= htmlspecialchars($bill['receiver_name']) ?>, <?= htmlspecialchars($bill['receiver_mobile']) ?></p>
        <p><strong>Weight:</strong> <?= htmlspecialchars($bill['weight']) ?> KG</p>
        <p><strong>Distance:</strong> <?= htmlspecialchars($bill['distance_km']) ?> KM</p>
        <p><strong>Total Amount:</strong> ₹<?= htmlspecialchars($bill['amount']) ?></p>
        <p><strong>Payment Status:</strong> <?= htmlspecialchars($bill['payment_status']) ?></p>
        <a class="download-btn" href="download_bill.php?shipment_id=<?= urlencode($bill['shipment_id']) ?>">⬇ Download Bill</a>
    <?php } else { ?>
        <p class="no-invoice">No invoice found for Shipment ID: <?= htmlspecialchars($shipment_id) ?></p>
    <?php } ?>
</div>

</body>
</html>
