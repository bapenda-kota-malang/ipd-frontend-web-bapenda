<?php


$scope = ' Daftar Nilai Individu < Nilai Sistem';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/nilai-individu-lk-sistem/tambah';

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
