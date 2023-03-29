<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db ="db_sekolah";

    $conn = mysqli_connect('localhost', 'root', '', 'db_sekolah');
    
    if($conn){
        // echo "Koneksi berhasil";
    }

    mysqli_select_db($conn, $db);
?>