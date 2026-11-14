<?php

include "Database/database.php";

if (isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //untuk melihat ada tidaknya data di database
    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = $db -> query($sql);

    //ketika datanya > 0 artinya datanya ada
    if ($result -> num_rows > 0) {
    $data = $result -> fetch_assoc();

        // Di gunakan Jika Menggunakan Password_hash()
        if (password_verify ($password, $data['password'])) {
    
        echo "
        <script>
            alert('Berhasil LOG-IN');
            window.location.href ='dashboard.php';
        </script>";
        exit;

        } else {
        echo "
        <script>
            alert('Tidak Berhasil LOG-IN')
        </script>";
         }
    } else {
    echo "
    <script>
      alert ('Akun tidak di temukan!!')
    </script>";
 }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Log-in</title>
    <link rel="Stylesheet" href="CSS/Style2.css">

</head>
<body>

    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>

    <div class="login-box">

        <h1>LOGIN</h1>

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

            <button type="submit" name="Submit">
                Masuk
            </button>

            <div class="register">
                Belum punya akun?
                <a href="register.php">Daftar</a>
            </div>

        </form>

    </div>

</body>
</html>