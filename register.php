<?php

include "Database/database.php";

if (isset($_POST['kirim'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //$password = $_POST['password'];

    //Mengecek apakah Akun-nya sudah ada belum.
    $cek = "SELECT * FROM users WHERE username = '$username'";
    $result = $db -> query($cek);

    if ($result -> num_rows > 0) {
        echo "
        <script>
            alert ('Akun Sudah di Gunakan!!');
            window.location.href ='register.php';
        </script>";
        exit;

        } else {

        $sql = "INSERT INTO users (username, password) values ('$username', '$password')"; 

        if ($db -> query($sql)){

        echo "
        <script>
        alert ('Berhasil Mendaftarkan Akun');
        window.location.href ='Login.php';
        </script>";
        exit;
        } else {

        echo "
        <script>
        alert ('Gagal Mendaftarkan Akun!!')
        </script>";
        }
     }
 }
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun</title>
    <link rel="Stylesheet" href="CSS/Style3.css">

</head>
<body>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>

    <div class="register-box">

        <h1>REGISTER</h1>

        <form action="" method="POST">

            <div class="input-group">
                <input
                    type="text"
                    name="username"
                    placeholder="Username"
                    required>
            </div>

            <div class="input-group">
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required>
            </div>

            <button type="submit" name="kirim">
                Daftar Akun
            </button>

            <div class="login-link">
                Sudah punya akun?
                <a href="Login.php">Login</a>
            </div>

        </form>

    </div>

</body>
</html>