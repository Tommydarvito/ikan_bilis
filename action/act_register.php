<?php
include '../config/connect.php';

if (isset($_POST['register'])) {

    $nama = $_POST['full_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $telepon = $_POST['phone_number'];

    $password = password_hash($pass, PASSWORD_DEFAULT);
    $role = "Pelanggan";

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
        alert('Email sudah terdaftar!');
        </script>";
    } else {
        $query = "INSERT INTO users (full_name, email, password, phone_number, role)
                  VALUES ('$nama', '$email', '$password', '$telepon', '$role')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Register berhasil');
             window.location='../pages/index.php';
            </script>";
        } else {
            echo "<script>alert('Register gagal');
            window.location='../pages/register_form.php';
            </script>";
        }
    }
}
