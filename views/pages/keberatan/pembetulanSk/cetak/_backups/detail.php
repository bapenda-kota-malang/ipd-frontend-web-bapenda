<?php

$scope = ' Mencetak Pembetulan SK Keberatan PBB';
$action = 'Detail';
$showBack = true;
$backUrl = '/keberatan/pembetulan-sk/cetak';
$showEdit = true;

$editUrl = '/keberatan/pembetulan-sk/cetak/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
