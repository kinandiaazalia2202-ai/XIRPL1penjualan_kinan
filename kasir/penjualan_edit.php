<?php 
    include 'header.php';
    include '../koneksi.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Transaksi Penjualan</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-10 col-md-offset-1">
                <a href="penjualan.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br><br>
            
            <?php
                $id = $_GET['id'];
                // Ambil data utama transaksi yang mau diedit
                $res = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE id_jual='$id'");
                $data_lama = mysqli_fetch_array($res);
            ?>
                <form method="POST" action="penjualan_update.php">
                    <input type="hidden" name="id_jual_asal" value="<?php echo $id; ?>">

                    <div class="form-group">
                        <label>Tanggal Transaksi</label>
                        <input type="date" name="tgl_jual" class="form-control" value="<?php echo $data_lama['tgl_jual'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Kasir</label>
                        <select class="form-control" name="user_id" required>
                            <?php
                                $user = mysqli_query($koneksi, "SELECT * FROM user");
                                while ($u = mysqli_fetch_array($user)) {
                            ?>
                                <option <?php if($u['user_id'] == $data_lama['user_id']){ echo "selected='selected'"; } ?> value="<?php echo $u['user_id']; ?>">
                                    <?php echo $u['user_nama']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th width="30%">Jumlah Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Baris 1 diisi data yang sudah ada
                            // Kita asumsikan baris lainnya adalah tambahan barang baru dalam transaksi yang sama
                            for($i=0; $i<5; $i++){ 
                            ?>
                            <tr>
                                <td>
                                    <select class="form-control" name="id_barang[]">
                                        <option value="">- Pilih Barang -</option>
                                        <?php
                                            $barang = mysqli_query($koneksi, "SELECT * FROM barang");
                                            while ($b = mysqli_fetch_array($barang)) {
                                                // Jika baris pertama, otomatis pilih barang yang sedang diedit
                                                $selected = ($i == 0 && $b['id_barang'] == $data_lama['id_barang']) ? "selected" : "";
                                                echo "<option $selected value='".$b['id_barang']."'>".$b['nama_barang']." (Stok: ".$b['stok'].")</option>";
                                            }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <?php 
                                        // Ambil jumlah lama jika baris pertama
                                        $data_brg = mysqli_query($koneksi, "SELECT harga_jual FROM barang WHERE id_barang='".$data_lama['id_barang']."'");
                                        $hb = mysqli_fetch_assoc($data_brg);
                                        $qty_awal = ($i == 0) ? ($data_lama['total_harga'] / $hb['harga_jual']) : "";
                                    ?>
                                    <input type="number" name="jumlah_jual[]" class="form-control" value="<?php echo $qty_awal; ?>">
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <input type="submit" class="btn btn-primary" value="Simpan Transaksi">
                </form>
            </div>
        </div>
    </div>
</div>