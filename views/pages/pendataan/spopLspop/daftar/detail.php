<?php

$scope = ' Daftar SPOP/LSPOP';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/spop-lspop/daftar';
$showEdit = true;

$editUrl = '/pendataan/spop-lspop/daftar/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
