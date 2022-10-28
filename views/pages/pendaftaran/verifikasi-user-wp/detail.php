<?php

$scope = ' Verifikasi Pendaftaran User WP';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendaftaran/verifikasi-user-wp';
$showApproval = true;

$editUrl = '/pendaftaran/verifikasi-user-wp/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
