<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Rental Skanega - Invoice</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
    <script type="text/javascript" src="../asset/js/jquery.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.js"></script>
</head>
<body>
    <?php
        session_start();
        if ($_SESSION['status'] != "login") {
            header("location:../index.php?pesan=belum_login");
        }
        include '../koneksi.php';
    ?>

    <div class="col-md-10 col-md-offset-1">
        <?php
            $id = $_GET['id'];

            // Query disesuaikan dengan tabel penjualan, barang, dan user
            $query = "SELECT penjualan.*, barang.nama_barang, barang.harga_jual, user.user_nama FROM penjualan JOIN barang ON penjualan.id_barang = barang.id_barang JOIN user ON penjualan.user_id = user.user_id  WHERE penjualan.id_jual = '$id'";
            
            $data = mysqli_query($koneksi, $query);
            while ($t = mysqli_fetch_array($data)) {
                // Menghitung jumlah barang (Total Harga / Harga Satuan)
                $jumlah = $t['total_harga'] / $t['harga_jual'];
        ?>
            <center>
                <h2>RENTAL SKANEGA</h2>
                <p>Jl. Limbangan No.Km. 1, Rejosari, Salamsari, Kec. Boja, Kab. Kendal, Jawa Tengah 51381.</p>
                <hr>
            </center>

            <a href="penjualan_invoice_cetak.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary pull-right">
                <i class="glyphicon glyphicon-print"></i> CETAK INVOICE
            </a>
            
            <br><br>

            <table class="table">
                <tr>
                    <th width="20%">NO. INVOICE</th>
                    <th>:</th>
                    <td>INV-SKANEGA-<?php echo $t['id_jual']; ?></td>
                </tr>
                <tr>
                    <th>Tgl. Transaksi</th>
                    <th>:</th>
                    <td><?php echo date('d-m-Y', strtotime($t['tgl_jual'])); ?></td>
                </tr>
                <tr>
                    <th>Nama Kasir</th>
                    <th>:</th>
                    <td><?php echo $t['user_nama']; ?></td>
                </tr>
                <tr>
                    <th>Metode Pembayaran</th>
                    <th>:</th>
                    <td>Tunai (Cash)</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <th>:</th>
                    <td><div class='label label-success'>LUNAS / SELESAI</div></td>
                </tr>
            </table>

            <br>

            <h4 class="text-center">Daftar Barang Rental</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="bg-info">
                        <th>Nama Barang</th>
                        <th class="text-center">Harga Satuan</th>
                        <th class="text-center" width="15%">Jumlah (Qty)</th>
                        <th class="text-right">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $t['nama_barang']; ?></td>
                        <td class="text-center">Rp <?php echo number_format($t['harga_jual'], 0, ',', '.'); ?></td>
                        <td class="text-center"><?php echo $jumlah; ?></td>
                        <td class="text-right">Rp <?php echo number_format($t['total_harga'], 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">TOTAL BAYAR</th>
                        <th class="text-right">Rp <?php echo number_format($t['total_harga'], 0, ',', '.'); ?></th>
                    </tr>
                </tfoot>
            </table>
        <?php
            }
        ?>

        <br><br>
        <div class="row">
            <div class="col-md-8">
                <p><b>Catatan:</b><br>
                - Harap simpan invoice ini sebagai bukti transaksi.<br>
                - Kerusakan barang rental menjadi tanggung jawab penyewa.</p>
            </div>
            <div class="col-md-4 text-center">
                <p>Kasir,</p>
                <br><br><br>
                <p><b>( ........................... )</b></p>
            </div>
        </div>

        <br><br>
        <p class="text-center">
            <i>"Terima Kasih Atas Kepercayaan Anda di Rental Skanega"</i>
        </p>

    </div>
</body>
</html>