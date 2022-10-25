<?php

$scope = ' Data Permohonan';
$action = 'Detail';
$showBack = true;
$backUrl = '/pelayanan/data-permohonan';
$showEdit = true;

$editUrl = '/pelayanan/data-permohonan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
