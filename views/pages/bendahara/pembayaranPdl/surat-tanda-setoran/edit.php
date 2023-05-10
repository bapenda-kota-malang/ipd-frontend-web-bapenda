<?php

$scope = ' Surat Tanda Setoran';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/bendahara/pembayaran-pdl/surat-tanda-setoran';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
