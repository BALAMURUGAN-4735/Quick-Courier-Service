<?php
require('fpdf/fpdf.php'); // Ensure FPDF is in your project folder

// Database connection
$conn = new mysqli("localhost", "root", "", "courier_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

//login status check and page redirrect 
include("guard_user.php"); 

// Validate shipment ID
if (!isset($_GET['shipment_id'])) {
    die("❌ Shipment ID not provided.");
}

$shipment_id = $_GET['shipment_id'];

// Fetch shipment & billing details
$sql1 = "SELECT 
            s.shipment_id, 
            s.sender_name, 
            s.receiver_name, 
            b.bill_id, 
            b.sender_address, 
            b.receiver_address, 
            s.weight, 
            b.distance_km, 
            b.amount, 
            b.payment_status
        FROM shipments s
        JOIN billing b ON s.shipment_id = b.shipment_id
        WHERE s.shipment_id = ?";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("s", $shipment_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("❌ No bill found for Shipment ID: $shipment_id");
}

$row = $result->fetch_assoc();

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();

// Header
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 10, 'Courier Service Invoice', 0, 1, 'C');
$pdf->Ln(8);

// Bill Details
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Bill ID:', 1);
$pdf->Cell(0, 10, $row['bill_id'], 1, 1);

$pdf->Cell(50, 10, 'Shipment ID:', 1);
$pdf->Cell(0, 10, $row['shipment_id'], 1, 1);

$pdf->Cell(50, 10, 'Sender Name:', 1);
$pdf->Cell(0, 10, $row['sender_name'], 1, 1);

$pdf->Cell(50, 10, 'Sender Address:', 1);
$pdf->Cell(0, 10, $row['sender_address'], 1, 1);

$pdf->Cell(50, 10, 'Receiver Name:', 1);
$pdf->Cell(0, 10, $row['receiver_name'], 1, 1);

$pdf->Cell(50, 10, 'Receiver Address:', 1);
$pdf->Cell(0, 10, $row['receiver_address'], 1, 1);

$pdf->Cell(50, 10, 'Weight (kg):', 1);
$pdf->Cell(0, 10, $row['weight'], 1, 1);

$pdf->Cell(50, 10, 'Distance (km):', 1);
$pdf->Cell(0, 10, $row['distance_km'], 1, 1);

$pdf->Cell(50, 10, 'Total Amount (Rs):', 1);
$pdf->Cell(0, 10, $row['amount'], 1, 1);

$pdf->Cell(50, 10, 'Payment Status:', 1);
$pdf->Cell(0, 10, $row['payment_status'], 1, 1);

// Download file with Bill ID in name
$pdf->Output("D", "Invoice_" . $row['bill_id'] . ".pdf");
?>
