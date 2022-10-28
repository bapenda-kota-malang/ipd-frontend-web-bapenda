<?php

$scope = ' Peta Tunggakan Pajak';
$action = 'Detail';
$showBack = true;
$backUrl = '/peta-pajak/tunggakan-pajak';
$showEdit = true;

$editUrl = '/peta-pajak/tunggakan-pajak/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
