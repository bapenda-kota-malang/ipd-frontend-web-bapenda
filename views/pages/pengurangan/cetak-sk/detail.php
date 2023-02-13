<?php

$scope = ' Cetak SK Pengurangan';
$action = 'Detail';
$showBack = true;
$backUrl = '/pengurangan/cetak-sk';
$showEdit = true;

$editUrl = '/pengurangan/cetak-sk/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
