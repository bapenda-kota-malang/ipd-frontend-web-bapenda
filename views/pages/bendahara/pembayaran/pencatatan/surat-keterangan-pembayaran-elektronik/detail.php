<?php

$scope = ' Surat Keterangan Pembayaran Elektronik';
$action = 'Detail';
$showBack = true;
$backUrl = '/bendahara/pembayaran/pencatatan/surat-keterangan-pembayaran-elektronik';
$showOK = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
