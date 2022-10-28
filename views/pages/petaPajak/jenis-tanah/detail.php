<?php

$scope = ' Peta Jenis Tanah';
$action = 'Detail';
$showBack = true;
$backUrl = '/peta-pajak/jenis-tanah';
$showEdit = true;

$editUrl = '/peta-pajak/jenis-tanah/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
