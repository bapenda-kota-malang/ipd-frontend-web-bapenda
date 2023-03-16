<?php

$scope = ' Surat Tanda Setoran';
$action = 'Detail';
$showBack = true;
$backUrl = '/bendahara/surat-tanda-setoran';
// $showEdit = true;

$editUrl = '/bendahara/surat-tanda-setoran/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
