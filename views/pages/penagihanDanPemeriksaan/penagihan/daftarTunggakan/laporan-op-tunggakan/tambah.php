<?php

$scope = ' Laporan OP Tunggakan';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/penagihan-dan-pemeriksaan/penagihan/daftar-tunggakan/laporan-op-tunggakan';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
