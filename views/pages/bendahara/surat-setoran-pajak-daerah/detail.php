<?php

$scope = ' Surat Setoran Pajak Daerah';
$action = 'Detail';
$showBack = true;
$backUrl = '/bendahara/surat-setoran-pajak-daerah';
// $showEdit = true;

$editUrl = '/bendahara/surat-setoran-pajak-daerah/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
