<?php

$scope = ' Rincian Perekaman Data';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/kinerja-org/rinci-rekam-data';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/kinerja-org/rinci-rekam-data/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
