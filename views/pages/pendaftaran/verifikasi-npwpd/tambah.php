<?php

$scope = ' Verifikasi Pendaftaran NPWPD';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/pendaftaran/verifikasi-npwpd';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
