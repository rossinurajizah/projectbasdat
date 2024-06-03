<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking</title>
    <link rel="stylesheet" href="css/booking.css">
    <script src="js/booking.js" defer></script>
</head>
<body>

<div class="form-container">
    <h2>Form Booking</h2>
    <form action="proses_booking.php" method="post" id="booking-form">
        <!-- Assuming IDPelanggan is retrieved from the session -->
        <input type="hidden" name="IDPelanggan" value="<?php echo $_SESSION['IDPelanggan']; ?>">
        <div class="form-group">
            <label for="TanggalReservasi">Tanggal Reservasi:</label>
            <input type="date" id="TanggalReservasi" name="TanggalReservasi" readonly required>
        </div>
        <div class="form-group">
            <label for="TanggalPelayanan">Tanggal Pelayanan:</label>
            <input type="date" id="TanggalPelayanan" name="TanggalPelayanan" required>
        </div>
        <div class="form-group">
            <label for="WaktuPelayanan">Waktu Pelayanan:</label>
            <select id="WaktuPelayanan" name="WaktuPelayanan" required>
                <option value="10:00">10:00</option>
                <option value="12:00">12:00</option>
                <option value="15:00">15:00</option>
            </select>
        </div>
        <div class="form-group">
            <label for="KategoriLayanan">Kategori Layanan:</label>
            <select id="KategoriLayanan" name="KategoriLayanan" required>
                <option value="Creambath">Creambath</option>
                <option value="Coloring">Coloring</option>
                <option value="Haircut">Haircut</option>
                <option value="Styling">Styling</option>
                <option value="Shampoo">Shampoo</option>
                <option value="Smoothing">Smoothing</option>
                <option value="HairSpa">HairSpa</option>
            </select>
        </div>
        <div class="form-group">
            <label for="PembayaranDP">Pembayaran DP via Saldo:</label>
            <input type="number" id="PembayaranDP" name="PembayaranDP" required>
        </div>
        <div class="form-group">
            <button type="submit">Booking</button>
        </div>
    </form>
</div>

</body>
</html>
