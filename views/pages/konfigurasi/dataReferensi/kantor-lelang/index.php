<?php

$this->params['container_unset'] = true;

$scope = ' Kantor Lelang';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/data-referensi/kantor-lelang/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

?>

<?php include Yii::getAlias('@vwCompPath/list/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/list/footer.php'); ?>
