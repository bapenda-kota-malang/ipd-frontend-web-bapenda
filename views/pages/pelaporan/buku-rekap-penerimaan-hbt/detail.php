<?php

$scope = ' Buku Rekapitulasi Penerimaan Harian/Bulanan/Tahunan';
$action = 'Detail';
$showBack = true;
$backUrl = '/pelaporan/buku-rekap-penerimaan-hbt';
$showEdit = true;

$editUrl = '/pelaporan/buku-rekap-penerimaan-hbt/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
