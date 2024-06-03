document.addEventListener('DOMContentLoaded', function() {
    var modal = document.createElement('div');
    modal.className = 'booking-modal';
    modal.innerHTML = `
        <div class="modal-content">
            <p>Booking berhasil! Silahkan Konfirmasi ke Nomor Berikut:</p>
            <a href="https://wa.me/+6282129394970" target="_blank">Klik di sini untuk konfirmasi via WhatsApp</a>
            <button onclick="closeModal()">Tutup</button>
        </div>
    `;
    document.body.appendChild(modal);
});

function closeModal() {
    var modal = document.querySelector('.booking-modal');
    modal.parentNode.removeChild(modal);
    window.location.href = 'booking_form.php';
}
