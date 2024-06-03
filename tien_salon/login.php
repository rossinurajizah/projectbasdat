<?php
session_start();

// Tampilkan pesan flash jika ada
if (isset($_SESSION['flash_message'])) {
    echo "<div class='alert alert-info'>" . $_SESSION['flash_message'] . "</div>";
    // Hapus pesan flash setelah ditampilkan
    unset($_SESSION['flash_message']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <div class="cont">
        <div class="form sign-in">
            <h2>Selamat Datang</h2>

            <!-- Tampilkan pesan flash di sini jika ada -->
            <?php if (isset($flash_message)): ?>
                <div class="flash-message">
                    <p><?php echo $flash_message; ?></p>
                </div>
            <?php endif; ?>

            <form action="proses_login.php" method="post">
                <label>
                    <span>Email</span>
                    <input type="email" name="email" required />
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password" required />
                </label>
                <p class="forgot-pass">Lupa password?</p>
                <button type="submit" class="submit">Masuk</button>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h3>Tidak punya akun? Silakan Daftar!</h3>
                </div>
                <div class="img__text m--in">
                    <h3>Jika Anda sudah punya akun, silakan masuk.</h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Daftar</span>
                    <span class="m--in">Masuk</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Buat Akun Anda</h2>
                <form action="proses_login.php" method="post">
                    <label>
                        <span>Username</span>
                        <input type="text" name="name" required />
                    </label>
                    <label>
                        <span>Email</span>
                        <input type="email" name="email" required />
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="password" required />
                    </label>
                    <button type="submit" class="submit">Daftar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
</body>
</html>
