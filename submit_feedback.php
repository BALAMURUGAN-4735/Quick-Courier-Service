<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $rating = intval($_POST['rating']);

    if ($rating >= 1 && $rating <= 5) {
        $query = "INSERT INTO user_feedback (username, message, rating) VALUES ('$username', '$message', $rating)";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('✅ Feedback submitted successfully!'); window.location.href='user_page.php';</script>";
        } else {
            echo "<script>alert('❌ Error submitting feedback.');</script>";
        }
    } else {
        echo "<script>alert('❌ Please select a valid rating.');</script>";
    }
}
?>
