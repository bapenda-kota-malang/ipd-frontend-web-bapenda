<?php

$this->params['container_unset'] = true;

$scope = ' OP dengan Pengurangan Stimulus/Kebijakan Pengenaan';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/lihat/data-obyek-pajak/op-dengan-pengurangan-stimulus-kebijakan-pengenaan/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

?>

<?php include Yii::getAlias('@vwCompPath/list/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/list/footer.php'); ?>
