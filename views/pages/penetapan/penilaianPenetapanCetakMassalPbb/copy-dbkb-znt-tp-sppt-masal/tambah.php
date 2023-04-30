<?php

$scope = ' Copy DBKB. ZNT. TP SPPT Masal Tahun Sebelumnya';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/penetapan/penilaian-penetapan-cetak-massal-pbb/copy-dbkb-znt-tp-sppt-masal';
$showOK = true;

$file = __DIR__ . '/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath') . '/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
