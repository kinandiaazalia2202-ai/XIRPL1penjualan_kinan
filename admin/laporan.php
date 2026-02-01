<?php 
    include 'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Filter Laporan Penjualan</h4>
        </div>
        <div class="panel-body">
            <form action="laporan.php" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th width="1%"></th>  
                    </tr>
                    <tr>
                        <td>
                            <input type="date" name="tgl_dari" class="form-control" required>
                        </td>
                        <td>
                            <input type="date" name="tgl_sampai" class="form-control" required>
                        </td>
                        <td>
                            <input type="submit" class="btn btn-primary" value="Filter">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <br>

    <?php   
        if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) {
            $dari = $_GET['tgl_dari'];
            $sampai = $_GET['tgl_sampai'];
    ?> 
        <div class="panel">
            <div class="panel-heading">
                <h4>Data Laporan Rental dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
            </div>
            <div class="panel-body">
                <a target="_blank" href="laporan_cetak.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-primary">
                    <i class="glyphicon glyphicon-print"></i> Cetak Laporan
                </a>
            <br><br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Kasir</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include '../koneksi.php';
                    
                    // Perbaikan Query Line 65:
                    // Menggunakan JOIN antara penjualan, barang, dan user
                    $query = "SELECT penjualan.*, barang.nama_barang, user.user_nama FROM penjualan JOIN barang ON penjualan.id_barang = barang.id_barang JOIN user ON penjualan.user_id = user.user_id WHERE date(tgl_jual) >= '$dari' AND date(tgl_jual) <= '$sampai' ORDER BY id_jual DESC";

                    $data = mysqli_query($koneksi, $query);
                    $no = 1;
                    $total_seluruh = 0;

                    while ($d = mysqli_fetch_array($data)) {
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
            </div>
        </div> 
    <?php
        }
    ?>
</div>