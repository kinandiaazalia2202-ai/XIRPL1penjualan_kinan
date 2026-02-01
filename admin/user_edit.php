<?php
    include 'header.php';
?>

<div class="container">
</br></br></br>
<div class="col-md-5 col-md-offset-3">

    <div class="panel">
        <div class="panel-heading">
            <h4>Edit User</h4>
        </div>
        <div class="panel-body">

            <?php
            include '../koneksi.php';
            $id = $_GET['user_id'];
            $data = mysqli_query($koneksi, "select * from user where user_id='$id'");
            while($d=mysqli_fetch_array($data)){
                ?>

                <form method="post" action="user_update.php">
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="<?php echo $d['user_id']; ?>">
                    </div>

                     <div class="form-group">
                    <label>Id User</label>
                        <input type="text" class="form-control" name="user_id" placeholder="Masukkan Id User .." value="<?php echo $d['user_id']; ?>">
                    </div>

                    <div class="form-group">
                    <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username .." value="<?php echo $d['username']; ?>">
                    </div>

                    <div class="form-group">
                    <label>Nama</label>
                        <input type="text" class="form-control" name="user_nama" placeholder="Masukkan Nama .." value="<?php echo $d['user_nama']; ?>">
                    </div>

                    <div class="form-group">
                    <label>Status</label>
                        <input type="number" class="form-control" name="user_status" placeholder="Masukkan Status .." value="<?php echo $d['user_status']; ?>">
                    </div>

                    </br>

                        <input type="submit" class="btn btn-primary"value="Simpan">
                    </form>

                    <?php
                }
                 ?>
            </div>     
        </div>
   </div>
</div>