
<?php
include '../koneksi.php';

$username = $_SESSION['username'];
$password_baru = md5($_POST['password_baru']);

$query = "UPDATE admin SET password = '$password_baru' WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

// cek hasil update
if ($result) {
    echo "<script>alert('Password berhasil diubah');
    window.location.href='ganti_password.php'</script>";
} else {
    echo "<script>alert('Gagal mengubah password: " . mysqli_error($koneksi) . "');
    window.location.href='ganti_password.php'</script>";
}
?>
