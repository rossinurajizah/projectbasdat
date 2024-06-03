<?php
include 'koneksi.php';

if (isset($_POST['buat_akun'])) {
    $IDUser = $_POST['IDUser'];
    $PasswordUser = $_POST['PasswordUser'];

    $check_query = "SELECT * FROM akun_user WHERE IDUser='$IDUser'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $error = "ID User $IDUser sudah digunakan.";
    } else {
        $insert_query = "INSERT INTO akun_user (IDUser, PasswordUser) VALUES ('$IDUser', '$PasswordUser')";

        if (mysqli_query($conn, $insert_query)) {
            $success = "Pembuatan akun berhasil.";
        } else {
            $error = "ERROR: Gagal menambahkan akun: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Akun Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/buatakun.css">
</head>
<body class="bg-light-pink">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="shadow w-450 p-3 bg-white rounded" action="buat_akun.php" method="post">
            <h4 class="display-4 fs-1 text-center">Buat Akun Baru</h4><br>
            <?php if (isset($success)) { ?>
            <div class="alert alert-success text-center" role="alert">
                <?php echo $success; ?>
            </div>
            <?php } elseif (isset($error)) { ?>
            <div class="alert alert-danger text-center" role="alert">
                <?php echo $error; ?>
            </div>
            <?php } ?>

            <div class="mb-3">
                <label class="form-label" for="IDUser">ID User:</label>
                <input type="text" class="form-control" id="IDUser" name="IDUser">
            </div>
            <div class="mb-3">
                <label class="form-label" for="PasswordUser">Password:</label>
                <input type="password" class="form-control" id="PasswordUser" name="PasswordUser">
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="buat_akun" class="btn btn-primary">Buat Akun</button>
                <a href="login.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
