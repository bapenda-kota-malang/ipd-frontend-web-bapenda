<?php

$this->params['container_unset'] = true;

$scope = ' Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/massal-skpdkb/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = __DIR__.'/_components/list_default.php';

?>

<?php include Yii::getAlias('@vwCompPath/list/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/list/footer.php'); ?>
