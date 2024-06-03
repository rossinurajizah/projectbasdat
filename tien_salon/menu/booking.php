<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="../css/booking.css">
    <script>
        function showSuccessPopup() {
            alert("Reservasi berhasil!");
            window.location.href = "index.php"; // Mengarahkan kembali ke index.php setelah menampilkan popup
        }
    </script>
</head>
<body>

<div class="form-container">
    <h2>Booking Form</h2>
    <form action="proses_booking.php" method="POST" onsubmit="showSuccessPopup()">
        <div class="form-group">
            <label for="tanggalReservasi">Tanggal Pelayanan:</label>
            <input type="date" id="tanggalReservasi" name="tanggal_reservasi" value="<?php echo date('Y-m-d'); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="tanggalPelayanan">Tanggal Pelayanan:</label>
            <input type="date" id="tanggalPelayanan" name="tanggal_pelayanan" required>
        </div>
        <div class="form-group">
            <label for="waktuPelayanan">Waktu Pelayanan:</label>
            <select id="waktuPelayanan" name="waktu_reservasi" required>
                <option value="09:00">09:00</option>
                <option value="13:00">13:00</option>
                <option value="17:00">17:00</option>
            </select>
        </div>
        <div class="form-group">
            <label for="kategoriLayanan">Kategori Layanan:</label>
            <select id="kategoriLayanan" name="layanan" required>
                <option value="Layanan1">Layanan 1</option>
                <option value="Layanan2">Layanan 2</option>
                <option value="Layanan3">Layanan 3</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
