<?php

include("connection.php");

session_start();

//login status check and page redirrect 
include("guard_user.php"); 

?>

<html>
<head>
    <title>Tracking Status</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
			background-color:lightseagreen;
        }

        .track {
            background: #fff;
            padding: 30px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            color: #333;
            text-align: left;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #2c3e50;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2c3e50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #34495e;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #2c3e50;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #34495e;
        }
</style>
</head>
<body>
<div class="track">
    <h1>Track Your Shipment</h1>
    <form action="track.php" method="POST">
        <label for="shipment_id">Enter Your Shipment ID:</label>
        <input type="text" name="shipment_id" id="shipment_id" placeholder="Shipment ID"required>
        <button type="submit">Track</button>
    </form>
    <a href="user_page.php">Back to Home</a>
	</div>
</body>
</html>
