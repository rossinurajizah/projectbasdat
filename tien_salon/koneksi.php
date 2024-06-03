<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "tien_salon";

    //Membuat Koneksi dengan database
    $conn = mysqli_connect($host,$user,$pass,$database);

    //Periksa Koneksi
    if(!$conn){
        echo"database tidak terhubung";
        die("Koneksi Database Gagal : ".mysqli_connect_error());
    }else {
        echo "";
    }

?>