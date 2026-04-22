<?php
include '../config/connect.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM spareparts WHERE id_sparepart=$id");
$d = mysqli_fetch_assoc($data);

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];

    mysqli_query($conn, "UPDATE spareparts SET 
        name='$name',
        stock='$stock',
        price='$price'
        WHERE id_sparepart=$id
    ");

    echo "<script>alert('Edit sparepart berhasil');
        window.location='../pages/sparepart.php';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sparepart</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            width: 300px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 5px black;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid gray;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input:focus {
            border-color: rgb(15, 15, 88);
            outline: none;
        }

        button {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            background: #2c3e50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.5s;
        }

        button:hover {
            background: #808183;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            color: blue;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Sparepart</h2>

        <form method="POST">
            <input type="text" name="name" value="<?= $d['name'] ?>" required>
            <input type="number" name="stock" value="<?= $d['stock'] ?>" min="0" required>
            <input type="text" name="price" value="<?= $d['price'] ?>" required>

            <button type="submit" name="btn">Edit</button>
        </form>

        <a href="sparepart.php">← Kembali</a>
    </div>
</body>

</html>