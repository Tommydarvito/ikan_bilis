<?php
include '../action/middleware.php';
only("Mekanik");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        .navbar {
            background-color: #2c3e50;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .navbar h2 {
            margin: 0;
        }

        .nav-link a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: 0.5s;
        }

        .nav-link a:hover {
            color: #417eba;
            transition: 0.5s;
        }

        .container {
            padding: 20px;
        }

        h1 {
            color: #333;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h2>Maju Motor Mekanik</h2>
        <div class="nav-link">
            <a href="#">Dashboard</a>
            <a href="sparepart.php">Sparepart</a>
            <a href="#">Booking</a>
            <a href="../action/act_logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h1>Halaman Mekanik</h1>
    </div>

</body>
</html>