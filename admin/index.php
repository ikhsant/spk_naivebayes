<?php
    include '../include/header.php';
    $id_user = $_SESSION['id_user'];
?>
<script type="text/javascript" src="../assets/js/Chart.min.js"></script>

<!-- query -->
<?php 
// $jumlah_siswa = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM siswa"));
// $jumlah_matpel = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM matpel"));
// $jumlah_training = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sample"));

$jumlah_siswa = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_siswa"));
$jumlah_sample = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_sample"));
// $jumlah_matpel = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM matpel"));
// $jumlah_training = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sample"));
?>
<!-- end query -->
<!-- user -->
<?php if($_SESSION['akses_level'] == "admin"){ ?>
<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <span style="font-size: 50px">
                            <?php echo $jumlah_siswa ?></span>
                        <div><b>Siswa</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <span style="font-size: 50px">
                            <?php echo $jumlah_sample ?></span>
                        <div><b>Jumlah Sample</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</div>
<?php } ?>
<!-- end user -->
<?php if($_SESSION['akses_level'] == "siswa"){ ?>
    <?php $id_siswa = $_SESSION['id_user'] ?>
    <?php $siswa = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM data_siswa WHERE id = '$id_siswa' ")) ?>

    <div class="row">

    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h2>Selamat Datang <?= $_SESSION['nama'] ?></h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>nisn</th>
                            <th>nama</th>
                            <th>absensi</th>
                            <th>naq</th>
                            <th>nba</th>
                            <th>nbi</th>
                            <th>nbin</th>
                            <th>nbs</th>
                            <th>nbtq</th>
                            <th>nfiqih</th>
                            <th>nipa</th>
                            <th>nips</th>
                            <th>nmtk</th>
                            <th>npjok</th>
                            <th>npkn</th>
                            <th>nprakarya</th>
                            <th>nqudis</th>
                            <th>nsb</th>
                            <th>nilaipraktek</th>
                            <th>ranking</th>
                        </tr>
                        <tr>
                            <th><?= $siswa['nisn'] ?></th>
                            <th><?= $siswa['nama'] ?></th>
                            <th><?= $siswa['absensi'] ?></th>
                            <th><?= $siswa['naq'] ?></th>
                            <th><?= $siswa['nba'] ?></th>
                            <th><?= $siswa['nbi'] ?></th>
                            <th><?= $siswa['nbin'] ?></th>
                            <th><?= $siswa['nbs'] ?></th>
                            <th><?= $siswa['nbtq'] ?></th>
                            <th><?= $siswa['nfiqih'] ?></th>
                            <th><?= $siswa['nipa'] ?></th>
                            <th><?= $siswa['nips'] ?></th>
                            <th><?= $siswa['nmtk'] ?></th>
                            <th><?= $siswa['npjok'] ?></th>
                            <th><?= $siswa['npkn'] ?></th>
                            <th><?= $siswa['nprakarya'] ?></th>
                            <th><?= $siswa['nqudis'] ?></th>
                            <th><?= $siswa['nsb'] ?></th>
                            <th><?= $siswa['nilaipraktek'] ?></th>
                            <th><?= $siswa['ranking'] ?></th>
                        </tr>
                    </table>
                </div>
                <h3>Anda masuk ke <b><?= $siswa['ranking'] ?></b></h3>
            </div>
        </div>
    </div>

</div>
<?php } ?>


<?php  
include '../include/footer.php';
?>