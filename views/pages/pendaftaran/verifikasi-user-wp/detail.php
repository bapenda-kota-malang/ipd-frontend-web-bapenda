<?php

$scope = ' Verifikasi Pendaftaran User WP';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendaftaran/verifikasi-user-wp';
$showOK = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
