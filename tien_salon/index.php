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
    <link rel="stylesheet" href="css/style.css">
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
    <!-- Hero section start -->
<section class="hero" id="home">
    <div class="banner-text">
        <h2 class="white animate__animated animate__fadeInUp animate__delay-1s">Hair Style, Lifestyle</h2>
        <h6 class="white animate__animated animate__fadeInUp animate__delay-1s">Hair Salon in<a href="http://w3Template.com" target="_blank" rel="dofollow" class="weblink"> Tasikmalaya</a>.</h6>

    </div>
    <a class="model intro animate__animated animate__fadeInUp animate__delay-1s"> <img src="image/hero2.png" class="img-fluid wow fadeInUp" /> </a>
</section>
<!-- Hero section end -->

    <!-- Hero section end -->

    <section class="servicesbtn" id="servicesbtn">
        <div class="services" data-aos="fade-up">
            <h1>Services</h1>
        </div>
        <div class="button-container" data-aos="fade-up">
            <a href="coloring.php" class="button_booking" style="background-image: url('image/coloring.png');"><span>Coloring</span></a>
            <a href="haircut.php" class="button_booking" style="background-image: url('image/logohaircut.png');"><span>Haircut</span></a>
            <a href="creambath.php" class="button_booking" style="background-image: url('image/creambath.png');"><span>CreamBath</span></a>
            <a href="hairspa.php" class="button_booking" style="background-image: url('image/hairspa.png');"><span>HairSpa</span></a>
            <a href="shampoo.php" class="button_booking" style="background-image: url('image/shampoo.png');"><span>Shampoo</span></a>
            <a href="smoothing.php" class="button_booking" style="background-image: url('image/smoothing.png');"><span>Smoothing</span></a>
            <a href="styling.php" class="button_booking" style="background-image: url('image/styling.png');"><span>Styling</span></a>
        </div>
    </section>

    <section class="contact section-padding" data-scroll-index='6' id="contact">
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="contact-info white" data-aos="fade-up" data-aos-anchor-placement="top-center">
                                    <div class="contact-item media"> <i class="fa fa-map-marker-alt media-left media-right-margin"></i>
                                        <div class="media-body">
                                            <p class="text-uppercase">Alamat</p>
                                            <div class="map-container">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d287326.68853812065!2d107.85028420120008!3d-7.131068504945333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f4e2d4f6eb047%3A0x3817e0cdff1f5f77!2sTien%20Salon!5e0!3m2!1sid!2sid!4v1717323998136!5m2!1sid!2sid" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                            <p class="text-uppercase">Rajapolah, Tasikmalaya</p>
                                        </div>
                                    </div>
                                    <div class="contact-item media"> <i class="fa fa-mobile media-left media-right-margin"></i>
                                        <div class="media-body">
                                            <p class="text-uppercase">Phone</p>
                                            <p class="text-uppercase"><a class="text-white" href="tel:+15173977100">08123456789</a> </p>
                                        </div>
                                    </div>
                                    <div class="contact-item media"> <i class="fa fa-envelope media-left media-right-margin"></i>
                                        <div class="media-body">
                                            <p class="text-uppercase">E-mail</p>
                                            <p class="text-uppercase"><a class="text-white" href="mailto:abcdefg@gmail.com">tiensalon@gmail.com</a> </p>
                                        </div>
                                    </div>
                                    <div class="contact-item media"> <i class="fa fa-clock media-left media-right-margin"></i>
                                        <div class="media-body">
                                            <p class="text-uppercase">Working Hours</p>
                                            <p class="text-uppercase">Mon-Fri 9.00 AM to 8.00PM.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
    </section>

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
