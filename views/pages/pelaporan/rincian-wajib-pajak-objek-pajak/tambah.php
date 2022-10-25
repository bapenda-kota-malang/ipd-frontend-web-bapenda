<?php

$scope = ' Rincian Wajib Pajak/Objek Pajak';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/pelaporan/rincian-wajib-pajak-objek-pajak';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
