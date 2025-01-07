<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "dbbukutamu";

// Membuat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
