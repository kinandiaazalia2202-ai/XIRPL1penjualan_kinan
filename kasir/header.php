<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Rental Kendaraan - Admin</title>
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
    <script type="text/javascript" src="../asset/js/jquery.js"></script>
    <script type="text/javascript" src="../asset/js/bootstrap.js"></script>
</head>
<body style="background: #f0f0f0">
    <?php
        session_start();
        if ($_SESSION['status']!="login") {
            header("location:../index.php?pesan=belum_login");
        }
    ?>

    <nav class="navbar navbar-inverse" style="border-radius: 0px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                </button>
                <a class="navbar-brand" href="index.php">Rental Skanega</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>                    
                    <li><a href="barang.php"><i class="glyphicon glyphicon-briefcase"></i> Data Barang</a></li>
                    
                    <li><a href="penjualan.php"><i class="glyphicon glyphicon-random"></i> Penjualan</a></li>
                    
                    <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text">Halo, <b><?php echo $_SESSION['username']; ?></b> (Kasir)</p></li>
                </ul>
             </div>
        </div>
    </nav>
</body>
</html>