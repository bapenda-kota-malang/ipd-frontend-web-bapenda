<?php

$this->params['container_unset'] = true;

$scope = ' Input SK Pembatalan Tunggal';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/pembatalan-sppt-skp/input-sk-pembatalan-tunggal/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

?>

<?php include Yii::getAlias('@vwCompPath/list/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/list/footer.php'); ?>
