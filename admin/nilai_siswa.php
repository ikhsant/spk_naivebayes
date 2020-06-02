<?php
$title = 'Nilai';
include "../include/header.php";
?>

<?php
$xcrud->table('nilai');
$xcrud->table_name('Data Nilai');
$xcrud->relation('id_siswa','siswa','id_siswa','nama_siswa');
$xcrud->relation('id_matpel','matpel','id_matpel','nama_matpel');

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

<?php 
include "../include/footer.php";
?>