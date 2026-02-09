<?php 
include '../koneksi.php';

$id_jual_asal = $_POST['id_jual_asal'];
$tgl_jual     = $_POST['tgl_jual'];
$user_id      = $_POST['user_id'];
$id_barang    = $_POST['id_barang']; // Ini berupa array
$jumlah_jual  = $_POST['jumlah_jual']; // Ini berupa array

// 1. KEMBALIKAN STOK LAMA SEBELUM DATA DIHAPUS
$lama = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id_jual='$id_jual_asal'");
$d_lama = mysqli_fetch_assoc($lama);
$id_brg_lama = $d_lama['id_barang'];

$cek_h = mysqli_query($koneksi, "SELECT harga_jual FROM barang WHERE id_barang='$id_brg_lama'");
$h_lama = mysqli_fetch_assoc($cek_h);
$qty_lama = $d_lama['total_harga'] / $h_lama['harga_jual'];

mysqli_query($koneksi, "UPDATE barang SET stok = stok + $qty_lama WHERE id_barang='$id_brg_lama'");

// 2. HAPUS DATA LAMA (Karena akan digantikan dengan input baru dari tabel)
mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_jual='$id_jual_asal'");

// 3. INPUT DATA BARU DARI TABEL EDIT
for($i=0; $i < count($id_barang); $i++){
    if($id_barang[$i] != ""){
        $brg = $id_barang[$i];
        $jml = $jumlah_jual[$i];

        // Ambil harga barang terbaru
        $res = mysqli_query($koneksi, "SELECT harga_jual FROM barang WHERE id_barang='$brg'");
        $row = mysqli_fetch_assoc($res);
        $harga = $row['harga_jual'];
        $total = $jml * $harga;

        // Simpan ke tabel penjualan
        mysqli_query($koneksi, "INSERT INTO penjualan (id_barang, tgl_jual, total_harga, user_id) 
                                VALUES ('$brg', '$tgl_jual', '$total', '$user_id')");

        // Kurangi stok barang
        mysqli_query($koneksi, "UPDATE barang SET stok = stok - $jml WHERE id_barang='$brg'");
    }
}

echo "<script>alert('Transaksi berhasil diperbarui!'); window.location.href='penjualan.php';</script>";
?>