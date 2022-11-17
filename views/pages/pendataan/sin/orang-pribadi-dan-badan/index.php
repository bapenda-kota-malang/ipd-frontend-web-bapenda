<?php


$scope = ' Orang Pribadi dan Badan';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/sin/orang-pribadi-dan-badan/tambah';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

// include Yii::getAlias('@vwCompPath/list/header.php');
include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
// include Yii::getAlias('@vwCompPath/detail/footer.php');
include Yii::getAlias('@vwCompPath/detail/footer.php');
