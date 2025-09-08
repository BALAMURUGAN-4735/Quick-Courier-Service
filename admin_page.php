<?php
session_start();

// ⏱ 10 minutes = 600 seconds
$timeout_duration = 600;

// 🧠 Check session last activity
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // ❌ Time over → session destroy + redirect to login
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=1");
    exit();
}

// ✅ Update last activity time
$_SESSION['LAST_ACTIVITY'] = time();

// 👇 Your normal session check (to make sure user is logged in)
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Quick Courier</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            background-color: #f0f2f5;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            color: white;
            padding: 20px 15px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 10px 15px;
            margin-bottom: 10px;
            text-decoration: none;
            background-color: #34495e;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #3d566e;
        }

        .main {
            flex: 1;
            padding: 30px;
        }

        .main h1 {
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-5px);
            background: #90b5dbff;
        }

        .card h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #34495e;
        }

        .card a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .logout {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 180px;
            text-align: center;
        }

        .logout a {
            background-color: #e74c3c;
            color: white;
            display: block;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .logout a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="admin_dashboard.php">🏠 Dashboard</a>
        <a href="view_shipments.php">📦 View Shipments</a>
        <a href="cancelled_orders.php">❌ Cancelled Orders</a>
        <a href="feedback.php">💬 User Feedback</a>
        <a href="manage_users.php">👥 Manage Users</a>

        <div class="logout">
            <a href="logout.php">🔓 Logout</a>
        </div>
    </div>

    <div class="main">
        <h1>Welcome, Admin!</h1>
        <div class="cards">
            <div class="card">
                <h3>📦 View Shipments</h3>
                <a href="view_shipments.php">Go →</a>
            </div>
            <div class="card">
                <h3>❌ Cancelled Orders</h3>
                <a href="cancelled_orders.php">Go →</a>
            </div>
            <div class="card">
                <h3>💬 User Feedback</h3>
                <a href="feedback.php">Go →</a>
            </div>
            <div class="card">
                <h3>👥 Manage Users</h3>
                <a href="manage_users.php">Go →</a>
            </div>
        </div>
    </div>

</body>
</html>