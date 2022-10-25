<?php

$scope = ' Rincian Wajib Pajak/Objek Pajak';
$action = 'Detail';
$showBack = true;
$backUrl = '/pelaporan/rincian-wajib-pajak-objek-pajak';
$showEdit = true;

$editUrl = '/pelaporan/rincian-wajib-pajak-objek-pajak/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
