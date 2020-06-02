<?php
    include '../include/header.php';
    $id_user = $_SESSION['id_user'];
?>
<script type="text/javascript" src="../assets/js/Chart.min.js"></script>

<!-- query -->
<?php 
$jumlah_siswa = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM siswa"));
$jumlah_matpel = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM matpel"));
$jumlah_training = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sample"));
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
                            <?php echo $jumlah_matpel ?></span>
                        <div><b>Mata Pelajaran</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <span style="font-size: 50px">
                            <?php echo $jumlah_training ?></span>
                        <div><b>Data Training</b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php } ?>
<!-- end user -->

<!-- <canvas id="perbandingan_pengajuan" height="200px"></canvas> -->

<script>
    var ctx = document.getElementById("perbandingan_pengajuan").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["laki-laki", "Perempuan"],
            datasets: [{
                label: '# perbandingan',
                data: [2, 3],
                backgroundColor: [
                    'rgb(0, 255, 153)',
                    'rgb(255, 128, 170)',
                ]
            }]
        },
    });
    </script>

<?php  
include '../include/footer.php';
?>