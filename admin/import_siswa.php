<?php
$title = 'Import Siswa';
include "../include/header.php";

require '../vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_POST['submit'])){
	if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
	 	
	 	// kosongkan table
	 	mysqli_query($conn,"TRUNCATE TABLE data_siswa");

	    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
	    $extension = end($arr_file);
	 
	    if('csv' == $extension) {
	        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
	    } else {
	        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
	    }
	 
	    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
	     
	    $sheetData = $spreadsheet->getActiveSheet()->toArray();
		for($i = 1;$i < count($sheetData);$i++)
		{
			$nisn         = $sheetData[$i]['1'];
			$nama         = $sheetData[$i]['2'];
			$absensi      = $sheetData[$i]['3'];
			$naq          = $sheetData[$i]['4'];
			$nba          = $sheetData[$i]['5'];
			$nbi          = $sheetData[$i]['6'];
			$nbin         = $sheetData[$i]['7'];
			$nbs          = $sheetData[$i]['8'];
			$nbtq         = $sheetData[$i]['9'];
			$nfiqih       = $sheetData[$i]['10'];
			$nipa         = $sheetData[$i]['11'];
			$nips         = $sheetData[$i]['12'];
			$nmtk         = $sheetData[$i]['13'];
			$npjok        = $sheetData[$i]['14'];
			$npkn         = $sheetData[$i]['15'];
			$nprakarya    = $sheetData[$i]['16'];
			$nqudis       = $sheetData[$i]['17'];
			$nsb          = $sheetData[$i]['18'];
			$nilaipraktek = $sheetData[$i]['19'];
			$ranking      = $sheetData[$i]['20'];
	        mysqli_query($conn,"insert into data_siswa (nisn,nama,absensi,naq,nba,nbi,nbin,nbs,nbtq,nfiqih,nipa,nips,nmtk,npjok,npkn,nprakarya,nqudis,nsb,nilaipraktek,ranking) values ('$nisn','$nama','$absensi','$naq','$nba','$nbi','$nbin','$nbs','$nbtq','$nfiqih','$nipa','$nips','$nmtk','$npjok','$npkn','$nprakarya','$nqudis','$nsb','$nilaipraktek','$ranking')");
	    }
	    $_SESSION['pesan'] = 'Berhasil mengimport data';
	    echo '<script>window.location.replace("import_siswa.php")</script>';
	}
}

$siswa = mysqli_query($conn,"SELECT * FROM data_siswa");

?>

<h1>Import Siswa</h1>
<div class="row">
	<div class="col-sm-4">
		<form method="post" enctype="multipart/form-data">
			<div class="panel panel-default">
				<div class="panel-heading">
					IMPORT DATA SISWA
				</div>
				<div class="panel-body">
					<div class="form-group">
						<input type="file" name="berkas_excel" required class="form-control">
					</div>
					<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> SUBMIT</button>
					<a href="../uploads/format_import_siswa.xlsx" target="_blank" class="btn btn-warning"><i class="fa fa-cloud-download"></i> DOWNLOAD FORMAT</a>
				</div>
			</div>
		</form>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-12">
		<?php
		$xcrud->table('data_siswa');
		$xcrud->table_name('Data Siswa');
		$xcrud->fields('ranking',true);
		// $xcrud->columns('klasifikasi',true);

		$xcrud->unset_view();
		$xcrud->unset_csv();
		// $xcrud->unset_limitlist();
		// $xcrud->unset_numbers();
		// $xcrud->unset_pagination();
		$xcrud->unset_print();
		// $xcrud->unset_sortable();
		$xcrud->hide_button('save_new');
		$xcrud->hide_button('save_edit');

		echo $xcrud->render();
		?>
	</div>
</div>

<?php 
include "../include/footer.php";
?>