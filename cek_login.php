<?php
session_start();
include "koneksi.php";

// Tangkap input dan lakukan sanitasi
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = $_POST['password']; // Jangan hash dulu di sini

// Query ke database
$query = $koneksi->prepare("SELECT * FROM tuser WHERE username = ? AND status = 'Aktif'");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_assoc();

if ($data) {
    // Verifikasi password
    if (password_verify($password, $data['password'])) {
        // Simpan data ke dalam session
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_pengguna'] = $data['nama_pengguna'];

        // Arahkan berdasarkan peran
        if ($data['role'] == 'admin') {
            header('location:admin.php');
        } else {
            header('location:user.php');
        }
    } else {
        echo "<script>alert('Password salah!'); document.location = 'index.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan atau akun tidak aktif!'); document.location = 'index.php';</script>";
}
?>
