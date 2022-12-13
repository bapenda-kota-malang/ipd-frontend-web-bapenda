<?php


$scope = ' Daftar SPOP/LSPOP';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/spop-lspop/daftar/tambah';
$showOK = true;

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
