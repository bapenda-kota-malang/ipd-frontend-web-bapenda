<?php

$scope = ' Rincian Perekaman STTS';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/kinerja-organisasi/rincian-perekaman-stts';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/kinerja-organisasi/rincian-perekaman-stts/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
