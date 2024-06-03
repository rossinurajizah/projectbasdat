<?php
session_start();

// Cek apakah user_email ada dalam sesi
if (!isset($_SESSION['user_email'])) {
    // Jika pengguna belum login, arahkan ke halaman login
    header('Location: login.php');
    exit();
}

$user_email = $_SESSION['user_email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/booking.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Booking Form</h2>

        <!-- Nomor Rekening Section -->
        <div class="alert alert-info">
            <h4>Informasi Pembayaran:</h4>
            <p>Silakan lakukan pembayaran DP ke nomor rekening berikut:</p>
            <p><strong>Bank BCA</strong></p>
            <p><strong>Nomor Rekening: 1234567890</strong></p>
            <p><strong>Atas Nama: Tien Salon</strong></p>
        </div>
        <!-- End of Nomor Rekening Section -->

        <form action="submit_booking.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama">Nama Pelanggan:</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user_email); ?>" readonly required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="no_hp">Nomor HP:</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" pattern="[0-9]{10,}" required>
                    <small class="form-text text-muted">Contoh: 081234567890</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="opsi_menu">Pilih Layanan:</label>
                    <select class="form-control" id="opsi_menu" name="opsi_menu" required>
                        <option value="Haircut">Haircut</option>
                        <option value="Styling">Styling</option>
                        <option value="Hairspa">Hairspa</option>
                        <option value="Coloring">Coloring</option>
                        <option value="Creambath">Creambath</option>
                        <option value="Shampoo">Shampoo</option>
                        <option value="Smoothing">Smoothing</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="alamat">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="tanggal">Pilih Tanggal:</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="pembayaran_dp">Upload Bukti Pembayaran (JPG/PNG):</label>
                    <input type="file" class="form-control-file" id="pembayaran_dp" name="pembayaran_dp" accept="image/jpeg, image/png" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit Booking</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
