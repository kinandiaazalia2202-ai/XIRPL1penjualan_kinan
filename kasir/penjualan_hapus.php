<?php 
include '../koneksi.php';

$id = $_GET['id'];

// 1. Ambil data penjualan yang akan dihapus untuk tahu id_barang dan jumlahnya
$data = mysqli_query($koneksi, "SELECT penjualan.*, barang.harga_jual FROM penjualan JOIN barang ON penjualan.id_barang = barang.id_barang WHERE id_jual='$id'");
$d = mysqli_fetch_array($data);

$id_barang = $d['id_barang'];
$qty = $d['total_harga'] / $d['harga_jual']; // Menghitung jumlah barang

// 2. Kembalikan stok ke tabel barang
mysqli_query($koneksi, "UPDATE barang SET stok = stok + $qty WHERE id_barang='$id_barang'");

// 3. Hapus data dari tabel penjualan
mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_jual='$id'");

header("location:penjualan.php?pesan=hapus");
?>