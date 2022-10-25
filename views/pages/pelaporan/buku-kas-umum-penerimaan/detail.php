<?php

$scope = ' Buku Kas Umum Penerimaan';
$action = 'Detail';
$showBack = true;
$backUrl = '/pelaporan/buku-kas-umum-penerimaan';
$showEdit = true;

$editUrl = '/pelaporan/buku-kas-umum-penerimaan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
