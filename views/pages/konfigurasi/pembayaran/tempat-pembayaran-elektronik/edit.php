<?php

$scope = ' Tempat Pembayaran Elektronik';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/konfigurasi/pembayaran/tempat-pembayaran-elektronik';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
