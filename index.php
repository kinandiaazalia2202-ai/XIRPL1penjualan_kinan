<!DOCTYPE html>
<html>
<head>
    <title> Sistem Informasi Rental Kendaraan Skanega </title>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
    <script type="text/javascript" src="asset/js/jquery.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.js"></script>
</head>
<body style="background: #f0f0f0;">
    <br><br><br>
    <center>
        <h2> Sistem Informasi Rental Kendaraan Skanega <br> REKAYASA PERANGKAT LUNAK SMK NEGERI 3 KENDAL </h2>
     <center>
    <br><br><br>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <?php
                if (isset($_GET['pesan'])){
                    if ($_GET['pesan'] == "gagal"){
                        echo "<div class='alert alert-danger'>Login gagal! username atau password salah!</div>";
                     }elseif ($_GET['pesan'] == "logout"){
                        echo "<div class='alert alert-info'>Anda telah berhasil logout!</div>";
                    }elseif ($_GET['pesan'] == "belum_login") {
                        echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin!</div>";
                    }
                }
            ?>

<form method="POST" action="login.php">
                <div class="form-group">
                    <label>USERNAME</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" name="password" class="form-control"placeholder="Masukkan Password">
                </div>
                <br>
                <input type="submit" value="Log In"  class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
        
</body>
</html>