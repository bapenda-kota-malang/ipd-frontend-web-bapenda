<?php

$scope = ' Pencatatan Tunggal';
$action = 'Detail';
$showBack = true;
$backUrl = '/bendahara/pembayaran/pencatatan/pencatatan-tunggal';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
