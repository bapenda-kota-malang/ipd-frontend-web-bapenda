<?php

// $this->params['container_unset'] = true;

$scope = ' Nilai Individu < Nilai Sistem';
$action = 'Pendataan';
$cancelUrl = '/pendataan/nilai-individu-lk-sistem';
$showOK = true;
$showCancel = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = __DIR__.'/_components/entryform_default.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
