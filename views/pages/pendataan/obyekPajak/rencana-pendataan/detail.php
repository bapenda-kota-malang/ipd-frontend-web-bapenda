<?php

$scope = ' Rencana Pendataan';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/obyek-pajak/rencana-pendataan';
$showEdit = true;

$editUrl = '/pendataan/obyek-pajak/rencana-pendataan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
