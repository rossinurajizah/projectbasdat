<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];

    // Ambil IDPelanggan berdasarkan user_id
    $sql = "SELECT IDPelanggan FROM pelanggan WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $IDPelanggan = $row['IDPelanggan'];

        // Ambil data form
        $tanggal_reservasi = $_POST['tanggal_reservasi'];
        $waktu_reservasi = $_POST['waktu_reservasi'];
        $layanan = $_POST['layanan'];
        $tanggal_pelayanan = $_POST['tanggal_pelayanan']; // Tambahkan input tanggal_pelayanan

        // Insert ke tabel reservasi
        $sql = "INSERT INTO reservasi (IDPelanggan, tanggal_reservasi, waktu_reservasi, layanan, tanggal_pelayanan) 
                VALUES ('$IDPelanggan', '$tanggal_reservasi', '$waktu_reservasi', '$layanan', '$tanggal_pelayanan')";

        if ($conn->query($sql) === TRUE) {
            echo "Reservasi berhasil dibuat";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Pelanggan tidak ditemukan.";
    }
}
?>
