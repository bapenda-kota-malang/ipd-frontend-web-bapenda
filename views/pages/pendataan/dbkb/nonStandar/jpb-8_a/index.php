<?php


$scope = ' DBKB JPB 8_A';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/dbkb/non-standar/jpb-8_a/tambah';

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
