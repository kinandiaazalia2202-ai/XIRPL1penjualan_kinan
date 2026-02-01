<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Penjualan - Rental Skanega</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
</head>
<body>
    <?php 
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }
    include '../koneksi.php'; 
    ?>

    <center>
        <h2>LAPORAN PENJUALAN / RENTAL</h2>
        <h4>RENTAL SKANEGA</h4>
    </center>

    <?php 
    if (isset($_GET['dari']) && isset($_GET['sampai'])) {
        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];
    ?>
        <br/>
        <p>Laporan dari tanggal <b><?php echo date('d-m-Y', strtotime($dari)); ?></b> sampai <b><?php echo date('d-m-Y', strtotime($sampai)); ?></b></p>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="1%">No</th>
                    <th>No. Invoice</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Kasir</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $total_seluruh = 0;
                // Query yang sama dengan di halaman laporan.php
                $data = mysqli_query($koneksi, "SELECT penjualan.*, barang.nama_barang, user.user_nama 
                                                FROM penjualan 
                                                JOIN barang ON penjualan.id_barang = barang.id_barang 
                                                JOIN user ON penjualan.user_id = user.user_id 
                                                WHERE date(tgl_jual) >= '$dari' AND date(tgl_jual) <= '$sampai' 
                                                ORDER BY id_jual DESC");

                while($d = mysqli_fetch_array($data)){
                    $total_seluruh += $d['total_harga'];
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>INV-<?php echo $d['id_jual']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($d['tgl_jual'])); ?></td>
                    <td><?php echo $d['nama_barang']; ?></td>
                    <td><?php echo $d['user_nama']; ?></td>
                    <td><?php echo "Rp. ".number_format($d['total_harga'], 0, ',', '.'); ?></td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5" class="text-right">TOTAL PENDAPATAN</th>
                    <th><?php echo "Rp. ".number_format($total_seluruh, 0, ',', '.'); ?></th>
                </tr>
            </tfoot>
        </table>

        <br/>
        <div class="row">
            <div class="col-xs-4 col-xs-offset-8 text-center">
                <p>Indralaya, <?php echo date('d-m-Y'); ?></p>
                <p>Mengetahui,</p>
                <br/><br/><br/>
                <p><b>Manager Rental</b></p>
            </div>
        </div>

    <?php 
    }
    ?>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>