<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Sesuaikan dengan path ke file autoload.php PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full-name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Konfigurasi SMTP dan akun Gmail
    $mail = new PHPMailer(true);
    try {
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com'; // Masukkan alamat email Gmail Anda
        $mail->Password = 'your_password'; // Masukkan password email Gmail Anda
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set pengirim dan penerima
        $mail->setFrom($email, $full_name);
        $mail->addAddress('237006030@student.unsil.ac.id'); // Masukkan alamat email tujuan

        // Set subject dan body email
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Kirim email
        $mail->send();
        echo "Email sent successfully.";
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>
