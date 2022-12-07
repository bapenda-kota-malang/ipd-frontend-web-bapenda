<?php

$scope = ' Data Permohonan';
$action = 'Status';
$showCancel = true;
$cancelUrl = '/pelayanan/data-permohonan';
$showOK = true;

$file = __DIR__.'/_components/status.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
