<?php

$scope = ' Data Permohonan';
$action = 'Verifikasi';
$showBack = true;
$backUrl = '/pelayanan/verifikasi-data-permohonan';
// $showOK = true;
$showApproval = true;
$file = __DIR__.'/_components/verifikasi-sppt.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
