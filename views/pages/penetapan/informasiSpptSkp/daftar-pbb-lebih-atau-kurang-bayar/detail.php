<?php

$scope = ' Daftar PBB Lebih atau Kurang Bayar';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/informasi-sppt-skp/daftar-pbb-lebih-atau-kurang-bayar';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
