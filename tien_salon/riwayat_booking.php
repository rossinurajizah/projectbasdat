<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tien_salon";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Prepare and bind
$stmt = $conn->prepare("SELECT IDReservasi, TanggalReservasi, TanggalPelayanan, KategoriLayanan, PembayaranDP 
                        FROM reservasi 
                        WHERE userID = ?");
$stmt->bind_param("i", $user_id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/riwayatbooking.css">
</head>
<body>

<div class="container mt-5">
    <div class="text-center mb-4">
        <h2>Riwayat Booking</h2>
    </div>
    <div class="table-responsive mb-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Reservasi</th>
                    <th>Tanggal Reservasi</th>
                    <th>Tanggal Pelayanan</th>
                    <th>Kategori Layanan</th>
                    <th>Pembayaran DP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if the query returned any rows
                if ($result->num_rows > 0) {
                    // Fetch and display each row of data
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["IDReservasi"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["TanggalReservasi"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["TanggalPelayanan"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["KategoriLayanan"]) . "</td>";

                        // Check if PembayaranDP is not empty
                        if (!empty($row["PembayaranDP"])) {
                            // Displaying a link to view the image if PembayaranDP is not empty
                            echo "<td><a href='#' class='view-image' data-toggle='modal' data-target='#imageModal' data-image='data:image/jpeg;base64," . base64_encode($row["PembayaranDP"]) . "'>Lihat gambar</a></td>";
                        } else {
                            // Displaying "No image" if PembayaranDP is empty
                            echo "<td>No image</td>";
                        }

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No bookings found</td></tr>";
                }
                // Close the database connection
                $stmt->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- Back Button -->
    <div class="text-center my-4">
        <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>

<!-- Modal for viewing image -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Gambar Pembayaran DP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Pembayaran DP" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for reservation success message -->
<div class="modal fade" id="referensiModal" tabindex="-1" role="dialog" aria-labelledby="referensiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="referensiModalLabel">Reservasi Berhasil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Modal content will be dynamically set here using JavaScript -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Trigger the modal and set its content for viewing image
        $('.view-image').on('click', function() {
            var imageSrc = $(this).data('image');
            $('#modalImage').attr('src', imageSrc);
        });

        // Trigger the modal if 'success' parameter is present in URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success') && urlParams.get('success') == '1') {
            $('#referensiModal').modal('show');
            // Set the modal content dynamically using AJAX or simply setting HTML content
            $('#referensiModal .modal-body').load('reservasi_berhasil.php');
        }
    });
</script>

</body>
</html>
