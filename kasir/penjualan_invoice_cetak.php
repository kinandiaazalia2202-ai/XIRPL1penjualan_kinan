<!DOCTYPE html>
<html>
<head>
    <title>Cetak Invoice - Rental Skanega</title>
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

    <div class="container">
        <?php 
        $id = $_GET['id'];
        $query = "SELECT penjualan.*, barang.nama_barang, barang.harga_jual, user.user_nama 
                  FROM penjualan 
                  JOIN barang ON penjualan.id_barang = barang.id_barang 
                  JOIN user ON penjualan.user_id = user.user_id 
                  WHERE penjualan.id_jual = '$id'";
        
        $data = mysqli_query($koneksi, $query);
        while($t = mysqli_fetch_array($data)){
            $jumlah = $t['total_harga'] / $t['harga_jual'];
        ?>
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

            <div class="row">
                <div class="col-xs-8">
                    <p><i>Terima kasih telah menggunakan jasa kami.</i></p>
                </div>
                <div class="col-xs-4 text-center">
                    <p>Hormat Kami,</p>
                    <br><br>
                    <p><b>( <?php echo $t['user_nama']; ?> )</b></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>