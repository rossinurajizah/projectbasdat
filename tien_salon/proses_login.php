<?php
// process.php

// Mulai session
session_start();

// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tien_salon";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah request method adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memeriksa apakah form sign-in atau sign-up yang dikirimkan
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Jika ada nama, maka ini adalah form sign-up
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Hash password untuk keamanan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepared statement untuk menyimpan data pengguna baru ke database
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($stmt->execute()) {
                // Set pesan flash jika pendaftaran berhasil
                $_SESSION['flash_message'] = "Pendaftaran berhasil!";
            } else {
                // Set pesan flash jika terjadi error
                $_SESSION['flash_message'] = "Error: " . $stmt->error;
            }

            // Redirect ke halaman login setelah pendaftaran berhasil
            header("Location: login.php");
            exit();

        } else {
            // Ini adalah form sign-in
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Prepared statement untuk memeriksa data login terhadap database
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Memeriksa password yang di-hash
                if (password_verify($password, $row['password'])) {
                    // Set pesan flash jika login berhasil
                    $_SESSION['flash_message'] = "Login berhasil!";

                    // Set session variables
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['logged_in'] = true;

                    // Redirect ke halaman booking_form.php setelah login berhasil
                    header("Location: index.php");
                    exit();
                } else {
                    // Set pesan flash jika password salah
                    $_SESSION['flash_message'] = "Password salah!";
                }
            } else {
                // Set pesan flash jika email tidak ditemukan
                $_SESSION['flash_message'] = "Email tidak ditemukan!";
            }
        }
    } else {
        // Set pesan flash jika pengiriman formulir tidak valid
        $_SESSION['flash_message'] = "Pengiriman formulir tidak valid!";
    }
} else {
    // Set pesan flash jika metode request tidak valid
    $_SESSION['flash_message'] = "Metode request tidak valid!";
}

// Menutup statement dan koneksi ke database
if (isset($stmt)) {
    $stmt->close();
}
$conn->close();

// Redirect kembali ke halaman login setelah selesai proses
header("Location: login.php");
exit();
?>
