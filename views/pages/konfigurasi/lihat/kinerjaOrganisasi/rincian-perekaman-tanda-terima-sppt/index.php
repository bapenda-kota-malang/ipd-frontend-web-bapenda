<?php

$this->params['container_unset'] = true;

$scope = ' Rincian Perekaman Tanda Terima SPPT';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/lihat/kinerja-organisasi/rincian-perekaman-tanda-terima-sppt/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

?>

<?php include Yii::getAlias('@vwCompPath/list/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/list/footer.php'); ?>
