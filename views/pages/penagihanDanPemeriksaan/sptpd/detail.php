<?php

$scope = ' Surat Peringatan Tunggakan Pajak Daerah';
$action = 'Detail';
$showBack = true;
$backUrl = '/penagihan-dan-pemeriksaan/sptpd';
$showEdit = true;

$editUrl = '/penagihan-dan-pemeriksaan/sptpd/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
