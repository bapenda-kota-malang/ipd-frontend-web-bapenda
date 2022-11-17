<?php

$scope = ' Laporan SK Ka. Kanwil';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/laporan/sk-ka-kanwil/tambah';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

// include Yii::getAlias('@vwCompPath/list/header.php');
include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
// include Yii::getAlias('@vwCompPath/detail/footer.php');
include Yii::getAlias('@vwCompPath/detail/footer.php');
