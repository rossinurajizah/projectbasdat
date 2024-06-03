<?php
session_start();
$profile_link = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'profile.php' : 'login.php';
$profile_icon = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'user' : 'log-in';
$profile_text = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'Logout' : 'Login';
$profile_url = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ? 'logout.php' : 'login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tien Salon</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Parisienne&family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/haircut.css">
</head>

<body>
    <nav class="navbar intro animate__animated animate__fadeInDown">
        <a href="#" class="navbar-logo">Tien<span>Salon</span>.</a>

        <div class="navbar-nav ">
            <a href="#home">Home</a>
            <a href="#servicesbtn">Services</a>
            <a href="riwayat_booking.php">Booking</a>
            <a href="#contact">Contact</a>
        </div>

        <div class="navbar-extra">
            <a href="<?php echo $profile_link; ?>" id="profile"><i data-feather="<?php echo $profile_icon; ?>"></i></a>
            <a href="#" id="menu"><i data-feather="menu"></i></a>
        </div>
    </nav>

    <!-- Hero section start -->
    <section class="deskripsi mt-5">
        <div class="deskripsi-text">
            <h1>Coloring</h1>
            <p>Dalam layanan mewarnai rambut di TIEN SALON, kami menyajikan pengalaman profesional
                yang dapat diandalkan untuk memperbarui penampilan Anda. Mulai dari warna yang konsisten
                hingga efek highlights yang memberikan nuansa yang beragam, tim kami siap membantu Anda
                menciptakan gaya rambut sesuai keinginan. Kami menggunakan teknik pewarnaan terbaru dan
                produk berkualitas tinggi untuk memberikan hasil yang memuaskan dan tahan lama. Mari
                bersama-sama menciptakan warna rambut yang sesuai dengan kepribadian dan gaya Anda di TIEN SALON!.
        </div>
        <a class="pic-haircut"><img src="image/coloring.png" class="img-haircut"></a>
    </section>

    <!-- Booking Button -->
    <div class="container text-right fixed-bottom mb-4 mr-4">
        <a href="booking_form.php" class="btn btn-primary"><i class="fas fa-calendar-alt"></i> Booking</a>
    </div>

    <!-- Back Button -->
    <div class="container text-center my-4">
        <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,288L34.3,250.7C68.6,213,137,139,206,90.7C274.3,43,343,21,411,16C480,11,549,21,617,69.3C685.7,117,754,203,823,197.3C891.4,192,960,96,1029,90.7C1097.1,85,1166,171,1234,192C1302.9,213,1371,171,1406,149.3L1440,128L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
    </svg>

    <script>
        feather.replace();
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- JavaScript -->
    <script src="../js/script.js"></script>
</body>

</html>
