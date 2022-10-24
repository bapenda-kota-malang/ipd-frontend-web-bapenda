<?php

$this->params['container_unset'] = true;

$scope = ' Daftar OP SIN';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/lihat/data-obyek-pajak/daftar-op-sin/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

?>

<?php include Yii::getAlias('@vwCompPath/list/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/list/footer.php'); ?>
