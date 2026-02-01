<?php
include '../koneksi.php';

$id_barang   = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];
$stok        = $_POST['stok'];

$query = "UPDATE barang SET nama_barang = '$nama_barang', harga_beli  = '$harga_beli', harga_jual  = '$harga_jual', stok  = '$stok' WHERE id_barang = '$id_barang'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    // Alert jika sukses dan kembali ke halaman daftar barang
    echo "<script>
            alert('Data Barang Telah Berhasil Diubah');
            window.location.href='barang.php';
          </script>";
} else {
    // Alert jika gagal beserta pesan errornya
    echo "<script>
            alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');
            window.location.href='barang.php';
          </script>";
}
?>
