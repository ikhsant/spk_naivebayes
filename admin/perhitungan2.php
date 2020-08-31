<?php
include '../include/header.php';
require '../vendor/autoload.php';
use Phpml\Classification\NaiveBayes;

$siswa = mysqli_query($conn,"SELECT * FROM data_siswa");
$sample = mysqli_query($conn,"SELECT * FROM data_sample");

$sample_semua = [];
foreach ($sample as $row => $value) {
	$sample_semua[] = [
		$value['absensi'],$value['naq'],$value['nba'],$value['nbi'],$value['nbin'],$value['nbs'],$value['nbtq'],$value['nfiqih'],$value['nipa'],$value['nips'],$value['nmtk'],$value['npjok'],$value['npkn'],$value['nprakarya'],$value['nqudis'],$value['nsb'],$value['nilaipraktek']
	];
}

$sample_klasifikasi = [];
foreach ($sample as $row => $value) {
	$sample_klasifikasi[] = $value['ranking'];
}

$siswa_semua = [];
foreach ($siswa as $row => $value) {
	$siswa_semua[] = [
		$value['absensi'],$value['naq'],$value['nba'],$value['nbi'],$value['nbin'],$value['nbs'],$value['nbtq'],$value['nfiqih'],$value['nipa'],$value['nips'],$value['nmtk'],$value['npjok'],$value['npkn'],$value['nprakarya'],$value['nqudis'],$value['nsb'],$value['nilaipraktek']
	];
}

// testing data
// $data = [[1,2,3],[1,2,2]];
// echo "<pre>";
// print_r($data);
// print_r($sample_semua);
// print_r($sample_klasifikasi);
// print_r($siswa_semua);
// echo "</pre>";



#################
if (isset($_POST['proses'])) {

	$classifier = new NaiveBayes();
	$classifier->train($sample_semua, $sample_klasifikasi);
	$hasil = $classifier->predict($siswa_semua);

	$siswa2 = mysqli_query($conn,"SELECT * FROM data_siswa ORDER BY id ASC ");
	$jumlah_siswa = mysqli_num_rows($siswa2);

	$order = 0;
	foreach ($siswa2 as $row2) {
		$id = $row2['id'];
		mysqli_query($conn,"UPDATE data_siswa SET ranking = '$hasil[$order]' WHERE id = '$id' ");
		$order++;
	}

	// echo "<pre>";
	$session['hasil_count'] = array_count_values($hasil);
	// echo "</pre>";

	$_SESSION['pesan'] = 'Berhasil menghitung';
    // echo '<script>window.location.replace("perhitungan2.php")</script>';
	// header('Location: perhitungan2.php');

}	

$hasil_count = $session['hasil_count'];
$jumlah = count($hasil);
$rank = ($hasil_count['Rank'] * 100) / $jumlah;
$tidak = ($hasil_count['Tidak'] * 100) / $jumlah;

// echo "<pre>";
// print_r($tidak);
// echo "</pre>";

?>
<script type="text/javascript" src="../assets/js/Chart.min.js"></script>

<style>
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }

    .table-responsive{
    	overflow-x: unset!important;
    	overflow-y: unset!important;
    }
}

</style>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				DATA SAMPLE
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>NO</th>
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
						<?php $no=1; foreach ($sample as $row_sample): ?>
						<tr>
							<th><?= $no++ ?></th>
							<th><?= $row_sample['nisn'] ?></th>
							<th><?= $row_sample['nama'] ?></th>
							<th><?= $row_sample['absensi'] ?></th>
							<th><?= $row_sample['naq'] ?></th>
							<th><?= $row_sample['nba'] ?></th>
							<th><?= $row_sample['nbi'] ?></th>
							<th><?= $row_sample['nbin'] ?></th>
							<th><?= $row_sample['nbs'] ?></th>
							<th><?= $row_sample['nbtq'] ?></th>
							<th><?= $row_sample['nfiqih'] ?></th>
							<th><?= $row_sample['nipa'] ?></th>
							<th><?= $row_sample['nips'] ?></th>
							<th><?= $row_sample['nmtk'] ?></th>
							<th><?= $row_sample['npjok'] ?></th>
							<th><?= $row_sample['npkn'] ?></th>
							<th><?= $row_sample['nprakarya'] ?></th>
							<th><?= $row_sample['nqudis'] ?></th>
							<th><?= $row_sample['nsb'] ?></th>
							<th><?= $row_sample['nilaipraktek'] ?></th>
							<th><?= $row_sample['ranking'] ?></th>
						</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				DATA SISWA
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>NO</th>
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
						<?php $no=1; foreach ($siswa as $row): ?>
						<tr>
							<th><?= $no++ ?></th>
							<th><?= $row['nisn'] ?></th>
							<th><?= $row['nama'] ?></th>
							<th><?= $row['absensi'] ?></th>
							<th><?= $row['naq'] ?></th>
							<th><?= $row['nba'] ?></th>
							<th><?= $row['nbi'] ?></th>
							<th><?= $row['nbin'] ?></th>
							<th><?= $row['nbs'] ?></th>
							<th><?= $row['nbtq'] ?></th>
							<th><?= $row['nfiqih'] ?></th>
							<th><?= $row['nipa'] ?></th>
							<th><?= $row['nips'] ?></th>
							<th><?= $row['nmtk'] ?></th>
							<th><?= $row['npjok'] ?></th>
							<th><?= $row['npkn'] ?></th>
							<th><?= $row['nprakarya'] ?></th>
							<th><?= $row['nqudis'] ?></th>
							<th><?= $row['nsb'] ?></th>
							<th><?= $row['nilaipraktek'] ?></th>
							<th><?= $row['ranking'] ?></th>
						</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	<hr>	
	<div style="max-width: 400px; margin: auto; margin-bottom: 100px" class="text-center">
		<h3>Chart</h3>
		<canvas id="myChart" width="400" height="400"></canvas>
	</div>

	<div class="text-center no-print">
		<form method="post">
			<button type="submit" name="proses" class="btn btn-primary btn-lg">PROSESS</button>
			<button type="button" class="btn btn-info btn-lg" onclick="window.print();">PRINT</button>
			<a href="perhitungan.php" class="btn btn-danger btn-lg">RESET</a>
		</form>
	</div>

	

<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
	    type: 'pie',
	    data: {
	        labels: ['Rank <?= round($rank,2) ?>%', 'Tidak <?= round($tidak,2) ?>%'],
	        datasets: [{
	            label: '# Kelompok',
	            data: [<?= round($rank,2) ?>, <?= round($tidak,2) ?>],
	            backgroundColor: [
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 99, 132, 0.2)',
	            ],
	            borderColor: [
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 99, 132, 1)',
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero: true
	                }
	            }]
	        }
	    }
	});
	</script>

<div style="margin-bottom: 400px"></div>
	