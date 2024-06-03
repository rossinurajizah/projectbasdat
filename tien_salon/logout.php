<?php
// Mulai sesi
session_start();

// Hapus semua data sesi
session_unset();
session_destroy();

// Redirect pengguna ke halaman login atau halaman lain yang sesuai
header("Location: index.php");
exit();
?>
