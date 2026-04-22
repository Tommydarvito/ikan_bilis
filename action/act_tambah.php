<?php
include '../config/connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    mysqli_query($conn, "INSERT INTO spareparts (name, stock, price) VALUES('$name', '$stock', '$price')");
    echo "<script>alert('Tambah sparepart berhasil');
        window.location='../pages/sparepart.php';
        </script>";
}
