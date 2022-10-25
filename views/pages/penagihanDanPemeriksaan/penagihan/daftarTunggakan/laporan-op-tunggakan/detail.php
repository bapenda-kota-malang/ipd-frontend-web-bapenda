<?php

$scope = ' Laporan OP Tunggakan';
$action = 'Detail';
$showBack = true;
$backUrl = '/penagihan-dan-pemeriksaan/penagihan/daftar-tunggakan/laporan-op-tunggakan';
$showEdit = true;

$editUrl = '/penagihan-dan-pemeriksaan/penagihan/daftar-tunggakan/laporan-op-tunggakan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
