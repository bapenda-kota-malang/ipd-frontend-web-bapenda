<?php

$scope = ' Verifikasi e-BPHTB';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/verifikasi-e-bphtb';
$showEdit = true;

$editUrl = '/penetapan/verifikasi-e-bphtb/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
