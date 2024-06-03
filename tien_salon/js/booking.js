document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("booking-form");
    const tanggalReservasiInput = document.getElementById("TanggalReservasi");

    // Set the current date for tanggal_reservasi and make it read-only
    const today = new Date().toISOString().split('T')[0];
    tanggalReservasiInput.value = today;

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Perform form submission via AJAX
        const formData = new FormData(form);
        
        fetch("proses_booking.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert("Reservasi Berhasil");
            window.close();
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});


