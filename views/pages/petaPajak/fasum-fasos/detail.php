<?php

$scope = ' Peta Fasum/Fasos';
$action = 'Detail';
$showBack = true;
$backUrl = '/peta-pajak/fasum-fasos';
$showEdit = true;

$editUrl = '/peta-pajak/fasum-fasos/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
