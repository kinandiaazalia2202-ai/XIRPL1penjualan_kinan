<?php
    include 'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Barang</h4>
    </div>
<div class="panel-body">
    <br>
    <table class="table table-bordered table-striped">
        <tr>
            <th width="1%">No</th>
            <th>Id barang </th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Stok</th>
        </tr>
        <?php
            include '../koneksi.php';
            $data = mysqli_query($koneksi,"select * from barang");
            $no = 1;
            while ($d=mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_barang']; ?></td>
                <td><?php echo $d['nama_barang']; ?></td>
                 <td><?php echo $d['harga_jual']; ?></td>
                <td><?php echo $d['stok']; ?></td>
            </tr>
        <?php
            }
