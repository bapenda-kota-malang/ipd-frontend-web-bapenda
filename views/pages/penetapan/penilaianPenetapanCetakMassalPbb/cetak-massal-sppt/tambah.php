<?php

$scope = ' Cetak Massal SPPT PBB';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/penetapan/penilaian-penetapan-cetak-massal-pbb/cetak-massal-sppt';
$showOK = true;
$showDownload = true;
$downloadUrl = "/output/pdf/pbb-cetak-massal";

$file = __DIR__ . '/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath') . '/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
// include Yii::getAlias('@vwCompPath/detail/footer.php');
