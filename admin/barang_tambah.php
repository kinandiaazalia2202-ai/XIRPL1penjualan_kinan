<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-0ffset-3">
        <div class="panel">
            <div class="panel-heading">
            <h4>Tambah Barang Baru</h4>
        </div>
        <div class="panel-body">
            <form method="POST" action="barang_aksi.php">
                <div class="form-group">
                    <label>Id Barang</label>
                    <input type="text" name="id_barang" class="form-control" placeholder="Masukkan Id Barang">
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang">
                </div>
                <div class="form-group">
                    <label>Harga Beli</label>
                    <input type="text" name="harga_beli" class="form-control" placeholder="Masukkan Harga Beli">
                </div>
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="text" name="harga_jual" class="form-control"placeholder="Masukkan Harga Jual">
                </div>
                 <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control"placeholder="Masukkan Stok">
                <div class="form-group">
                <br>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
    