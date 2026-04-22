<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah sparepart</title>

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
            ;
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
            transition: 0.5s;
        }

        a {
            margin-left: 5px;
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
        <h2>Tambah Sparepart</h2>
        <form method="POST" action="../action/act_tambah.php">
            <input type="text" name="name" placeholder="Masukan nama sparepart" required>
            <input type="number" name="stock" placeholder="Masukan stock" min="0" required>
            <input type="text" name="price" placeholder="Masukan harga" required>
            <button type="submit" name="submit">Tambah</button>
        </form>
        <a href="sparepart.php">← Kembali</a>
    </div>
</body>

</html>