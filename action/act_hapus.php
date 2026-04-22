<?php
include '../config/connect.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM spareparts WHERE id_sparepart=$id");

echo "<script>alert('Hapus sparepart berhasil');
        window.location='../pages/sparepart.php';
        </script>";
?>