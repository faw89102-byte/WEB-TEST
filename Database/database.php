<?php

$hostname = "localhost";
$username = "root";
$password = "";
$localhost_name = "data_diri";

$db = mysqli_connect($hostname, $username, $password, $localhost_name);

if ($db -> connect_error) {
    echo "gagal Menghubungkan";
    die("error!");
}
?>