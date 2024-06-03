<?php
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Jika pengguna belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Mendapatkan nama pengguna dari sesi
$username = isset($_SESSION['user']) ? $_SESSION['user'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-gYeqfRvPsMUqL5O9/jbLd8fhg/ps22Ke7wy9WgWvMg3L6TZz9+6bL3A5Mvq9MOfu6s01o0Em+us2gx0YZ3ynQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/profile.css">
</head>

<body class="bg-light-pink">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="shadow p-3 bg-white rounded">
            <div class="profile-content text-center">
                <div class="profile-heading">
                    <h1><?php echo $username; ?></h1>
                    <p>Selamat datang kembali! Ini adalah profil Anda.</p>
                </div>
                <div class="profile-image">
                    <i class="fas fa-user-circle fa-5x"></i>
                </div>
                <a href="logout.php" class="btn btn-primary logout-link">Logout</a>
            </div>
        </div>
    </div>
</body>

</html>