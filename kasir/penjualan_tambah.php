<?php 
    include 'header.php'; 
    include '../koneksi.php'; 
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading"><h4>Tambah Transaksi Penjualan Baru</h4></div>
        <div class="panel-body">
            <form method="post" action="penjualan_aksi.php">
                <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="date" name="tgl_jual" class="form-control" required value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label>Kasir</label>
                    <select name="user_id" class="form-control" required>
                        <?php 
                        $user = mysqli_query($koneksi, "SELECT * FROM user");
                        while($u = mysqli_fetch_array($user)){ ?>
                            <option value="<?php echo $u['user_id']; ?>"><?php echo $u['user_nama']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th width="20%">Jumlah Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=1; $i<=5; $i++){ ?>
                        <tr>
                            <td>
                                <select name="id_barang[]" class="form-control">
                                    <option value="">- Pilih Barang -</option>
                                    <?php 
                                    $barang = mysqli_query($koneksi, "SELECT * FROM barang");
                                    while($b = mysqli_fetch_array($barang)){ ?>
                                        <option value="<?php echo $b['id_barang']; ?>">
                                            <?php echo $b['nama_barang']; ?> (Stok: <?php echo $b['stok']; ?>)
                                        </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="jumlah_jual[]" class="form-control" min="1">
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </form>
        </div>
    </div>
</div>