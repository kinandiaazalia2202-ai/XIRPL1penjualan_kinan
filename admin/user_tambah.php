<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-0ffset-3">
        <div class="panel">
            <div class="panel-heading">
            <h4>Tambah Pelanggan Baru</h4>
        </div>
        <div class="panel-body">
            <form method="POST" action="user_aksi.php">
                <div class="form-group">
                    <label>Id User</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="user_nama" class="form-control" placeholder="Masukkan Nama user">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="number" name="user_status" class="form-control"placeholder="Masukkan Status">
                <div class="form-group">
                <br>
                <input type="submit" class="btn btn-primary" value="Simpan">
            </form>
        </div>
    </div>
    