<?php

$scope = ' Informasi Rinci SPPT';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/spop-lspop/info-rinci-sppt';
$showEdit = null;

$editUrl = '/pendataan/spop-lspop/info-rinci-sppt/'.$id.'/edit';
$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
