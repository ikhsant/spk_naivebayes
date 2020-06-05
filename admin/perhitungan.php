<?php
include '../include/header.php';
require '../vendor/autoload.php';
use Phpml\Classification\NaiveBayes;

$status_error = false;
$status_error_sample = false;
$query_matpel = mysqli_query($conn,"SELECT * FROM matpel ORDER BY id_matpel ASC");
$jumlah_matpel = mysqli_num_rows($query_matpel);
$query_klasifikasi = mysqli_query($conn,"SELECT * FROM klasifikasi");
$klasifikasi = [];
foreach ($query_klasifikasi as $klasifikasi_row) {
	$klasifikasi[] = $klasifikasi_row['nama_klasifikasi'];
}

$query_sample = mysqli_query($conn,"SELECT * FROM sample");

$sample_all = [];


for ($i=0; $i < $query_sample->num_rows ; $i++) { 
	$sample = mysqli_fetch_assoc($query_sample);

	$id_sample = $sample['id_sample'];
	$query_nilai_sample = mysqli_query($conn, "SELECT nilai FROM training WHERE id_sample = '$id_sample' ORDER BY id_matpel ASC");
	$jumlah_nilai_sample = mysqli_num_rows($query_nilai_sample);

	// cek jika semua matpel ada nilai nya
	if ($jumlah_nilai_sample < $jumlah_matpel) {
		$status_error_sample = true;
	}

	foreach ($query_nilai_sample as $nilai_sample) {
		// cek jika nilai sudah ada jika tidak masukan nol
			$sample['nilai'][] = $nilai_sample['nilai'];

	}

	$sample_all[$i] = $sample;

}

$sample_semua = [];
// print_r($klasifikasi);
// print_r($sample_all);
foreach ($sample_all as $row_sample => $value_sample) {
	$sample_semua[] = $value_sample['nilai'];
}
// echo "<pre>";
// print_r($sample_semua);
// echo "</pre>";

$query_siswa = mysqli_query($conn,"SELECT id_siswa,nama_siswa FROM siswa");

$siswa_all = [];


for ($i=0; $i < $query_siswa->num_rows ; $i++) { 
	$siswa = mysqli_fetch_assoc($query_siswa);

	$id_siswa = $siswa['id_siswa'];
	$query_nilai = mysqli_query($conn, "SELECT nilai FROM nilai WHERE id_siswa = '$id_siswa' ORDER BY id_matpel ASC");
	$jumlah_nilai = mysqli_num_rows($query_nilai);

	// cek jika semua matpel ada nilai nya
	if ($jumlah_nilai < $jumlah_matpel) {
		$status_error = true;
	}

	foreach ($query_nilai as $nilai) {
		// cek jika nilai sudah ada jika tidak masukan nol
			$siswa['nilai'][] = $nilai['nilai'];
	}

	$siswa_all[$i] = $siswa;

}

// echo "<pre>";
$siswa_semua = [];
foreach ($siswa_all as $row => $value) {
	$siswa_semua[] = $value['nilai'];
}
// echo "</pre>";


#################
if (isset($_GET['proses'])) {

	$classifier = new NaiveBayes();
	$classifier->train($sample_semua, $klasifikasi);
	$hasil = $classifier->predict($siswa_semua);

	// echo "<pre>";
	// print_r($hasil);
	// echo "</pre>";
}	

#################
?>
<?php if ($status_error_sample): ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<h1>Ada Nilai Sample yang belum terisi silahkakn cek</h1>
		</div>
	</div>
	<?php else: ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				DATA TRAINING
			</div>
			<table class="table table-bordered">
				<tr>
					<th>NAMA</th>
					<?php foreach ($query_matpel as $matpel): ?>
						<th><?= $matpel['nama_matpel'] ?></th>
					<?php endforeach ?>
				</tr>
				<?php foreach ($sample_all as $sample_row => $value_sample): ?>
				<tr>
					<td><?= $value_sample['nama_sample'] ?></td>
					<?php foreach ($value_sample['nilai'] as $nilai_sample_row => $value_nila_sample): ?>
						<td><?= $value_nila_sample ?></td>
					<?php endforeach ?>
				</tr>
				<?php endforeach ?>

		</table>
	</div>
<?php endif ?>

<?php if ($status_error): ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<h1>Ada Nilai Siswa yang belum terisi silahkakn cek</h1>
		</div>
	</div>
	<?php else: ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				DATA SISWA
			</div>
			<table class="table table-bordered">
				<tr>
					<th>NAMA</th>
					<?php foreach ($query_matpel as $matpel): ?>
						<th><?= $matpel['nama_matpel'] ?></th>
					<?php endforeach ?>
					<th>KLASIFIKASi</th>
				</tr>
				<?php foreach ($siswa_all as $row1 => $value1): ?>
				<tr>
					<td><?= $value1['nama_siswa'] ?></td>
					<?php foreach ($value1['nilai'] as $row2 => $value2): ?>
						<td><?= $value2 ?></td>
					<?php endforeach ?>

					<?php if (isset($_GET['proses'])): ?>
						<td class="bg-success"><?= $hasil[$row1] ?></td>
						<?php
						$id_siswa = $value1['id_siswa'];
						mysqli_query($conn,"UPDATE siswa SET klasifikasi = '$hasil[$row1]' WHERE id_siswa = '$id_siswa' ") 
						?>
					<?php else: ?>
						<td class="bg-danger"></td>
					<?php endif ?>

				</tr>
				<?php endforeach ?>

		</table>
	</div>
<?php endif ?>

<?php if (!$status_error AND !$status_error_sample): ?>
	<div class="text-center">
		<a href="?proses=ya" class="btn btn-primary btn-lg">PROSESS</a>
		<a href="perhitungan.php" class="btn btn-danger btn-lg">RESET</a>
	</div>
<?php endif ?>

<div style="margin-bottom: 400px"></div>