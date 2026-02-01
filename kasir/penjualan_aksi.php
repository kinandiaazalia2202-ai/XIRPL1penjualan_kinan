<?php 
include '../koneksi.php';

$tgl_jual    = $_POST['tgl_jual'];
$user_id     = $_POST['user_id'];
$id_barangs  = $_POST['id_barang']; // Berbentuk Array
$jumlahs     = $_POST['jumlah_jual']; // Berbentuk Array

// Loop melalui setiap baris input
foreach($id_barangs as $key => $id_barang){
    if(!empty($id_barang)){
        $qty = $jumlahs[$key];

        // 1. Ambil data harga jual dan stok dari tabel barang
        $data_b = mysqli_query($koneksi, "SELECT harga_jual, stok FROM barang WHERE id_barang='$id_barang'");
        $b = mysqli_fetch_assoc($data_b);
        
        $harga_jual = $b['harga_jual'];
        $stok_lama  = $b['stok'];

        // 2. Hitung total harga per item
        $total_harga = $qty * $harga_jual;

        // 3. Simpan ke tabel penjualan
        mysqli_query($koneksi, "INSERT INTO penjualan (id_barang, tgl_jual, total_harga, user_id) 
                                VALUES ('$id_barang', '$tgl_jual', '$total_harga', '$user_id')");

        // 4. Kurangi stok barang
        $stok_baru = $stok_lama - $qty;
        mysqli_query($koneksi, "UPDATE barang SET stok='$stok_baru' WHERE id_barang='$id_barang'");
    }
}

header("location:penjualan.php?pesan=berhasil");
?>