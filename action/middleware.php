<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: ../pages/login_form.php");
    exit;
}

function only($role) {
    if ($_SESSION['role'] != $role) {
        echo "<script>alert('Akses ditolak'); 
        window.location='../pages/login.php';
        </script>";
        exit;
    }
}
?>