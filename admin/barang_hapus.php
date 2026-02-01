<?php
include '../koneksi.php';

// Menangkap id_barang yang dikirim dari URL
$id = $_GET['id_barang'];

// Query DELETE diarahkan ke tabel barang
$query = "DELETE FROM barang WHERE id_barang='$id'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Gagal menghapus: " . mysqli_error($koneksi));
}

// Redirect kembali ke barang.php setelah berhasil
echo "<script>
    alert('Data Barang berhasil dihapus');
    window.location.href='barang.php';
</script>";
?>
