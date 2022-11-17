<?php


$scope = ' Update RT/RW Massal';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/update-rt-rw-massal/tambah';

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
