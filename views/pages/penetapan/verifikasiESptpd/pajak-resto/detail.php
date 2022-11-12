<?php

$scope = ' Pengajuan ESPTPD Pajak Resto';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/verifikasi-e-sptpd/pajak-resto';
$showApproval = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
