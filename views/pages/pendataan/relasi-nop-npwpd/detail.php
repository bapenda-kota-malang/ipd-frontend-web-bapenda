<?php

$scope = ' Relasi NOP-NPWPD';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/relasi-nop-npwpd';
$showEdit = true;

$editUrl = '/pendataan/relasi-nop-npwpd/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
