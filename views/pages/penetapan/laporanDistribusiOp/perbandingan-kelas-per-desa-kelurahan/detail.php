<?php

$scope = ' Perbandingan Kelas Per Desa/Kelurahan';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/laporan-distribusi-op/perbandingan-kelas-per-desa-kelurahan';
$showEdit = true;

$editUrl = '/penetapan/laporan-distribusi-op/perbandingan-kelas-per-desa-kelurahan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
