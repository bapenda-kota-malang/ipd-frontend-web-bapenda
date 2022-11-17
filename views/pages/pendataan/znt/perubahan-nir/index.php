<?php


$scope = ' Perubahan NIR';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/znt/perubahan-nir/tambah';

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
