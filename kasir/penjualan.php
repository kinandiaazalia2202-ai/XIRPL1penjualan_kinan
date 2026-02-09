<?php
    include 'header.php';
    include '../koneksi.php';
?>

<div class="container">
    <div class="alert alert-info text-center">
       <h4>DATA KASIR</h4>
    <div class='panel'>
        <div class='panel-heading'>
            <h4>Data Penjualan Rental Skanega</h4>
        </div>
        <div class='panel-body'>

            <a href="penjualan_tambah.php" class="btn btn-sm btn-info pull-right">Tansaksi Baru</a>
            <br><br>
            <table class='table table-boordered table-striped'>
                <tr>
                    <th width="1%">No</th>
                    <th style="min-width: 90px;" class="text-center">Invoice
                    <th>ID Jual</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah Jual</th>
                    <th style="min-width: 100px;" class="text-center">Total Harga
                    <th>Tanggal Jual</th>
                    <th>Nama Kasir</th>
                    <th style="min-width: 210px;" class="text-center">OPSI
                </tr>
                <?php
                    $data = mysqli_query($koneksi, "SELECT penjualan.*, barang.nama_barang, barang.harga_jual, user.user_nama FROM penjualan JOIN barang ON penjualan.id_barang = barang.id_barang JOIN user ON penjualan.user_id = user.user_id ORDER BY id_jual DESC"); 
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>INVOICE-<?php echo $d['id_jual']; ?></td>
                        <td><?php echo $d['id_jual']; ?></td>
                        <td><?php echo $d['nama_barang']; ?></td>
                        <td>Rp <?php echo number_format($d['harga_jual'], 0, ',', '.'); ?></td>
                        <td><?php echo $d['total_harga'] / $d['harga_jual']; // Ini untuk menampilkan jumlah jual ?></td>
                        <td><b>Rp <?php echo number_format($d['total_harga'], 0, ',', '.'); ?></b></td>
                        <td><?php echo date('d-m-Y', strtotime($d['tgl_jual'])); ?></td>
                        <td><?php echo $d['user_nama']; ?></td>
                        <td>
                            <a href="penjualan_invoice.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-sm btn-warning">INVOICE</a>
                            <a href="penjualan_edit.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-sm btn-info">EDIT</a>
                            <a href="penjualan_hapus.php?id=<?php echo $d['id_jual']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Batalkan transaksi?')">Hapus</a>
                        </td>
                        </td>
                    </tr>
                <?php 
                    } 
                ?>
            </table>
        </div>
    </div>
</div>

