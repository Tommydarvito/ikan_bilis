<?php
include '../action/middleware.php';
only("Admin");

include '../config/connect.php';
$result = mysqli_query($conn, "SELECT * FROM spareparts");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sparepart</title>

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

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: 0.5s;
        }

        .nav-links a:hover {
            color: #417eba;
            transition: 0.5s;
        }

        .container {
            width: 85%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #2c3e50;
            color: white;
        }

        .btn {
            background: #3498db;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #2980b9;
        }

        .delete {
            background: red;
        }

        .delete:hover {
            background: darkred;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            background: #27ae60;
        }

        .add-btn:hover {
            background: #1e8449;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>Admin Panel</h2>
        <div class="nav-links">
            <a href="dashboard_admin.php">Dashboard</a>
            <a href="#">User</a>
            <a href="sparepart.php">Sparepart</a>
            <a href="#">Booking</a>
            <a href="../action/act_logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Data Sparepart</h2>

        <a href="tambah_sparepart.php" class="btn add-btn">+ Tambah Sparepart</a>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Stock</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>

            <?php $no = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td>Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                    <td>
                        <a href="edit_sparepart.php?id=<?= $row['id_sparepart'] ?>" class="btn">Edit</a>
                        <a href="../action/act_hapus.php?id=<?= $row['id_sparepart'] ?>"
                            class="btn delete"
                            onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>

</body>

</html>