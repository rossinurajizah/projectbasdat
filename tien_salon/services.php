<?php
session_start(); // Memulai sesi

// Periksa apakah pengguna sudah login
$logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

// Jika pengguna belum login, arahkan mereka ke halaman login
if (!$logged_in) {
    header('Location: login.php');
    exit;
}
?>