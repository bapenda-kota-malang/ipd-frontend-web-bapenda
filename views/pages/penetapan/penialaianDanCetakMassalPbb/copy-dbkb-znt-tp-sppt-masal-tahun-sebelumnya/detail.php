<?php

$scope = ' Copy DBKB. ZNT. TP SPPT Masal Tahun Sebelumnya';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/penialaian-dan-cetak-massal-pbb/copy-dbkb-znt-tp-sppt-masal-tahun-sebelumnya';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
