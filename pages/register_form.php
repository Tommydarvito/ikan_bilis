<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <style>
        body{
            font-family : Arial, sans-serif;
            background: #2c3e50;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container{
            background: white;
            width: 300px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 5px black;
            text-align: center;;
        }

        input{
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid gray;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input:focus{
            border-color: rgb(15, 15, 88);
            outline: none;
        }

        button{
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

        button:hover{
            background: #808183;
            transition: 0.5s;
        }

        a{
            margin-left: 5px;
            color: blue;
            text-decoration: none;
        }

        a:hover{
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="../action/act_register.php">
            <input type="text" name="full_name" placeholder="Masukan Nama Lengkap" required>
            <input type="email" name="email" placeholder="Masukan Email" required>
            <input type="text" name="password" placeholder="Masukan password untuk akun ini" required>
            <input type="number" name="phone_number" placeholder="Masukan nomor telepon anda" min="0" required>
            <button type="submit" name="register">Register</button>
        </form>
        <p>Sudah punya akun?<a href="login_form.php">Login</a></p>
    </div>
</body>

</html>