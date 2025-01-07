<?php
include "koneksi.php";

// Hash untuk admin
$admin_password = password_hash("admin", PASSWORD_DEFAULT);
$guru_password = password_hash("12345", PASSWORD_DEFAULT);

// Update password di database
$query1 = $koneksi->prepare("UPDATE tuser SET password = ? WHERE username = 'admin'");
$query1->bind_param("s", $admin_password);
$query1->execute();

$query2 = $koneksi->prepare("UPDATE tuser SET password = ? WHERE username = 'guru'");
$query2->bind_param("s", $guru_password);
$query2->execute();

echo "Password berhasil diperbarui!";
?>
