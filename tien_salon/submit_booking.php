<?php
session_start();

// Cek apakah user_email ada dalam sesi
if (!isset($_SESSION['user_email'])) {
    // Jika pengguna belum login, arahkan ke halaman login
    header('Location: login.php');
    exit();
}

require 'koneksi.php'; // Ganti dengan koneksi database Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $opsi_menu = $_POST['opsi_menu'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $user_id = $_SESSION['user_id'];
    $tanggal_reservasi = date('Y-m-d'); // tanggal reservasi adalah tanggal saat ini

    // Proses upload file
    if (isset($_FILES['pembayaran_dp']) && $_FILES['pembayaran_dp']['error'] === UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['pembayaran_dp']['tmp_name'];
        $file_name = $_FILES['pembayaran_dp']['name'];
        $file_size = $_FILES['pembayaran_dp']['size'];
        $file_type = $_FILES['pembayaran_dp']['type'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Periksa ekstensi file
        $allowed_ext = ['jpg', 'jpeg', 'png'];
        if (in_array($file_ext, $allowed_ext)) {
            // Baca file gambar menjadi BLOB
            $pembayaran = file_get_contents($file_tmp_path);

            // Simpan informasi booking ke database
            $sql = "INSERT INTO reservasi (TanggalReservasi, TanggalPelayanan, KategoriLayanan, PembayaranDP, userID)
                    VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $tanggal_reservasi, $tanggal, $opsi_menu, $pembayaran, $user_id);

            if ($stmt->execute()) {
                // Redirect to success page with a success flag
                header('Location: riwayat_booking.php?success=1');
                exit();
            } else {
                echo "Terjadi kesalahan: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "<script>
                    alert('Ekstensi file tidak diperbolehkan.');
                    window.history.back();
                  </script>";
        }
    } else {
        echo "<script>
                alert('Terjadi kesalahan dalam mengupload file.');
                window.history.back();
              </script>";
    }

    $conn->close();
}
?>
