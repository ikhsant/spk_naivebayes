<?php

?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" style="padding: 4px!important">
                <img src="../uploads/logo/<?php echo $setting['logo']; ?>" height="100%">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><b>
                <?php echo $setting['nama_website']; ?></b>
            </a>
            <?php if($_SESSION['akses_level'] == "admin"){ ?>
                <ul class="nav navbar-nav">
                    <!-- <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-users"></span> SISWA <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="siswa.php"><span class="fa fa-users"></span> Siswa</a></li>
                            <li><a href="nilai_siswa.php"><span class="fa fa-bookmark"></span> Nilai Siswa</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-users"></span> SAMPLE <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="sample.php"><span class="fa fa-bookmark"></span> Sample</a></li>
                            <li><a href="nilai_sample.php"><span class="fa fa-bookmark"></span> Nilai Sample</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-gears"></span> NAIVEBAYES <span class="caret"></span></a>
                        <ul class="dropdown-menu"> -->
                            <!-- <li><a href="klasifikasi.php"><span class="fa fa-bookmark"></span> Klasifikasi</a></li> -->
                            <!-- <li><a href="perhitungan.php"><span class="fa fa-bookmark"></span> Perhitungan</a></li> -->
                     <!--    </ul>
                    </li> -->
                    <!-- <li><a href="matpel.php"><span class="fa fa-book"></span> Mata Pelajaran</a></li> -->
                    <li><a href="import_siswa.php"><span class="fa fa-book"></span> Import Siswa</a></li>
                    <li><a href="import_sample.php"><span class="fa fa-book"></span> Import Sample</a></li>
                    <li><a href="perhitungan2.php"><span class="fa fa-book"></span> Perhitungan</a></li>

                </ul>
            <?php } ?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['nama'] ?> <span class="label label-info"><?php echo $_SESSION['akses_level'] ?></span></a>
                </li>
                <?php if($_SESSION['akses_level'] == "admin"){ ?>
                    <li><a href="setting.php"><span class="glyphicon glyphicon-cog"></span> Setting</a></li>
                <?php  } ?>
                <li><a href="logout.php" onclick="return confirm('Yakin Keluar?')"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- notif pesan success -->
            <?php if (!empty($_SESSION['pesan'])) { ?>
                <div class="alert alert-success">
                    <i class="fa fa-check"></i>
                    <?php echo $_SESSION['pesan']; ?>
                    <?php $_SESSION['pesan'] = ''; ?>
                </div>
                <br>
            <?php } ?>
            <!-- end notif pesan success -->
            <!-- notif pesan ewrror -->
            <?php if (!empty($_SESSION['error'])) { ?>
                <div class="alert alert-danger">
                    <i class="fa fa-check"></i>
                    <?php echo $_SESSION['error']; ?>
                    <?php $_SESSION['error'] = ''; ?>
                </div>
                <br>
            <?php } ?>
                <!-- end notif pesan ewrror -->