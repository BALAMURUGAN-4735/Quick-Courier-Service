<?php
// Password-ah "" kulla kandippa type pannanum
$conn = mysqli_connect("localhost:3307", "root", "", "courier_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>