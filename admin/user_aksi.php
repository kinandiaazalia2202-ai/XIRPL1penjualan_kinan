<?php
    include '../koneksi.php';

        $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $user_nama = $_POST['user_nama'];
    $user_status = $_POST['user_status'];

    mysqli_query($koneksi,"INSERT INTO user (user_id, username, user_nama, user_status) VALUES ('$user_id', '$username', '$user_nama', '$user_status')");


    header("location:user.php");
?>
