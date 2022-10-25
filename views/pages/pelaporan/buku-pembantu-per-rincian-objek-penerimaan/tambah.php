<?php

$scope = ' Buku Pembantu Per Rincian Objek Penerimaan';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/pelaporan/buku-pembantu-per-rincian-objek-penerimaan';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
