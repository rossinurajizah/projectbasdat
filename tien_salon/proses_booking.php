<?php
include "koneksi.php";
session_start(); // Start the session if not already started
// Assuming id_pelanggan is stored in session
if (!isset($_SESSION['logged_in'])) {
    die("Anda harus login terlebih dahulu.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $IDPelanggan = $_SESSION['IDPelanggan'];
    $TanggalReservasi = $_POST['TanggalReservasi'];
    $TanggalPelayanan = $_POST['TanggalPelayanan'];
    $WaktuPelayanan = $_POST['WaktuPelayanan'];
    $KategoriLayanan = $_POST['KategoriLayanan'];
    $PembayaranDP = $_POST['PembayaranDP'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tien_salon";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $sql = "INSERT INTO reservasi (IDPelanggan, TanggalReservasi, TanggalPelayanan, WaktuPelayanan, KategoriLayanan, PembayaranDP) VALUES ('$IDPelanggan', '$TanggalReservasi', '$TanggalPelayanan', '$WaktuPelayanan', '$KategoriLayanan', '$PembayaranDP')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservasi Berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
