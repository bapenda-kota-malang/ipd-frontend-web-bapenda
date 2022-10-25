<?php

$scope = ' Buku Pembantu Penerimaan Sejenis via Bank';
$action = 'Detail';
$showBack = true;
$backUrl = '/pelaporan/buku-pembantu-penerimaan-sejenis-via-bank';
$showOK = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
