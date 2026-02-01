<?php
    session_start();
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Pastikan nama kolom di database adalah 'username' dan 'password'
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        // Langkah PENTING: Mengambil data user menjadi array
        $user = mysqli_fetch_assoc($query);

        $_SESSION['user_id']     = $user['user_id'];     // Menyimpan ID untuk query di index
        $_SESSION['username']    = $user['username'];
        $_SESSION['status']      = "login";
        $_SESSION['user_status'] = $user['user_status']; // Menyimpan status (1 atau 2)

        // Pengalihan berdasarkan status
        if ($user['user_status'] == 1) {
            header("Location: admin/index.php");
            exit;
        } else if ($user['user_status'] == 2) {
            header("Location: kasir/index.php");
            exit;
        }

    } else {
        header("Location: index.php?pesan=gagal");
        exit;
    }
?>