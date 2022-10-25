<?php

$scope = ' Berita Acara Penagihan/Pemeriksaan';
$action = 'Detail';
$showBack = true;
$backUrl = '/penagihan-dan-pemeriksaan/berita-acara-penagihan-pemeriksaan';
$showEdit = true;

$editUrl = '/penagihan-dan-pemeriksaan/berita-acara-penagihan-pemeriksaan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
