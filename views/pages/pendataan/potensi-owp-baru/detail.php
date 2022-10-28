<?php

$scope = ' Potensi Objek/Wajib Pajak Baru';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/potensi-owp-baru';
$showEdit = true;

$editUrl = '/pendataan/potensi-owp-baru/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
