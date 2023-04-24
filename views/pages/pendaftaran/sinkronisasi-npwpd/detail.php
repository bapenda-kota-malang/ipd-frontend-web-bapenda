<?php

$scope = ' Sinkronoisasi NPWPD';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendaftaran/sinkronisasi-npwpd';
$showEdit = true;

$editUrl = '/pendaftaran/sinkronisasi-npwpd/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
