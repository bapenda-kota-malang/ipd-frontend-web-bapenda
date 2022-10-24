<?php

$this->params['container_unset'] = true;

$scope = ' Rincian Perekaman STTS';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/lihat/kinerja-organisasi/rincian-perekaman-stts/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

?>

<?php include Yii::getAlias('@vwCompPath/list/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/list/footer.php'); ?>
