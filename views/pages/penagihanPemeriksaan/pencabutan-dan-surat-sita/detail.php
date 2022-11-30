<?php

$scope = ' Pencabutan dan Pencetakan Surat Sita';
$action = 'Detail';
$showBack = true;
$backUrl = '/penagihan-pemeriksaan/pencabutan-dan-surat-sita';
$showEdit = true;

$editUrl = '/penagihan-pemeriksaan/pencabutan-dan-surat-sita/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
