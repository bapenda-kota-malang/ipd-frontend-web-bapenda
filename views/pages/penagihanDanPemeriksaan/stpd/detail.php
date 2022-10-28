<?php

$scope = ' Surat Tagihan Pajak Daerah';
$action = 'Detail';
$showBack = true;
$backUrl = '/penagihan-dan-pemeriksaan/stpd';
$showEdit = true;

$editUrl = '/penagihan-dan-pemeriksaan/stpd/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
