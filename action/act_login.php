<?php
session_start();
include '../config/connect.php';

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $data  = mysqli_fetch_assoc($query);

    if ($data) {
        if (password_verify($pass, $data['password'])) {

            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['nama']    = $data['full_name'];
            $_SESSION['role']    = $data['role'];

            if ($data['role'] == "Admin") {
                echo "<script>alert('Login Berhasil');
                window.location='../pages/dashboard_admin.php';
                </script>";
            } elseif ($data['role'] == "Mekanik") {
                echo "<script>alert('Login Berhasil');
                window.location='../pages/dashboard_mekanik.php';
                </script>";;
            } else {
                echo "<script>alert('Login Berhasil');
                window.location='../pages/dashboard_pelanggan.php';
                </script>";;
            }
        } else {
            echo "<script>alert('Password salah');
            window.location='../pages/index.php';
            </script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan');
        window.location='../pages/index.php';
            </script>";;
    }
}
