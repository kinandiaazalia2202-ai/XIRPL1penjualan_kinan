<?php
    include 'header.php';
    include '../koneksi.php';
?>

<div class="container">
    <div class="alert alert-info text-center">
        <h4><b>Selamat Datang! </b>Sistem Informasi Rental Kendaraan</h4>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h4>Home</h4>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-th-large"></i>
                                <span class="pull-right">
                                    <?php
                                        $barang = mysqli_query($koneksi, "select * from barang");
                                        echo mysqli_num_rows($barang);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Jenis Barang
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-list-alt"></i>
                                <span class="pull-right">
                                    <?php
                                        $stok = mysqli_query($koneksi, "select SUM(stok) as total_stok from barang");
                                        $s = mysqli_fetch_array($stok);
                                        echo $s['total_stok'] ? $s['total_stok'] : 0;
                                    ?>
                                </span>
                            </h1>
                            Total Stok Armada
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                <span class="pull-right">
                                    <?php
                                        $penjualan = mysqli_query($koneksi, "select * from penjualan");
                                        echo mysqli_num_rows($penjualan);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Transaksi
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-usd"></i>
                                <span class="pull-right" style="font-size: 25px;">
                                    <?php
                                        $pendapatan = mysqli_query($koneksi, "select SUM(total_harga) as total from penjualan");
                                        $p = mysqli_fetch_array($pendapatan);
                                        echo "Rp" . number_format($p['total'], 0, ',', '');
                                    ?>
                                </span>
                            </h1>
                            Total Pendapatan
                        </div>
                    </div>
                </div>

            </div>
        </div> 
</div>

   <div class="panel">
    <div class="panel-heading">
        <h4>Riwayat Transaksi Penjualan Terakhir</h4>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="1%">No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Jual</th>
                    <th>Total Harga</th>
                    <th>Tanggal Jual</th>
                    <th>Nama Kasir</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody> <?php 
                $no = 1;
                // Query diperbaiki: Menambahkan barang.harga_jual dan user.user_status
                $data = mysqli_query($koneksi, "SELECT penjualan.*, barang.nama_barang, barang.harga_jual, user.user_nama, user.user_status 
                                                FROM penjualan 
                                                JOIN barang ON penjualan.id_barang = barang.id_barang 
                                                JOIN user ON penjualan.user_id = user.user_id 
                                                ORDER BY id_jual DESC LIMIT 10");
                
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_barang']; ?></td>
                        <td>
                            <?php 
                            echo $d['total_harga'] / $d['harga_jual']; 
                            ?>
                        </td>
                        <td><b>Rp <?php echo number_format($d['total_harga'], 0, ',', '.'); ?></b></td>
                        <td><?php echo date('d-m-Y', strtotime($d['tgl_jual'])); ?></td>
                        <td><?php echo $d['user_nama']; ?></td>
                        <td>
                            <?php
                                if ($d['user_status'] == '1'){
                                    echo "<span class='label label-info'>ADMIN</span>";
                                } elseif ($d['user_status'] == '2'){
                                    echo "<span class='label label-warning'>KASIR</span>";
                                }
                            ?>
                        </td>     
                    </tr>
                    <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>