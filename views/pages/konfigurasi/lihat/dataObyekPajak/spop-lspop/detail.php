<?php

$scope = ' Daftar SPOP/LSPOP';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/data-obyek-pajak/spop-lspop';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/data-obyek-pajak/spop-lspop/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
