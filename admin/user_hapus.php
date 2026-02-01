<?php
    include '../koneksi.php';
    $id = $_GET['user_id'];
    mysqli_query($koneksi, "delete from user where user_id='$id'");

    echo "<script>alert('Data akan dihapus?'); window.location.href='user.php'</script>";
?>

