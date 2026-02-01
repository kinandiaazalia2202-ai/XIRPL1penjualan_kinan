<?php
include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Ganti Password</h4>
            </div>
            <div class="panel-body">
                <form method="POST" action="ganti_password_update.php">
                    <div class="form-group">
                        <label>Masukkan Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" placeholder="Masukkan Password Baru Anda" required>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Ganti Password">
                </form>
            </div>
        </div>
    </div>
</div>

