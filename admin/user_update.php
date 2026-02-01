<?php
    include '../koneksi.php';

    $user_id = $_POST['user_id'] ?? '';
    $username = $_POST['username'] ?? '';
    $user_nama = $_POST['user_nama'] ?? '';
    $user_status = $_POST['user_status'] ?? '';


    $query = "UPDATE user SET username='$username', user_nama='$user_nama', user_status='$user_status' WHERE user_id='$user_id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data Telah Diubah');
              window.location.href='user.php'</script>";
    } else {
        echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');
              window.location.href='user.php'</script>";
    }
?>