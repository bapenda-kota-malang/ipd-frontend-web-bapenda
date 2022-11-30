<?php

$scope = ' Surat Peringatan Tunggakan Pajak Daerah';
$action = 'Detail';
$showBack = true;
$backUrl = '/penagihan-pemeriksaan/surat-peringantan-tunggak-pd';
$showEdit = true;

$editUrl = '/penagihan-pemeriksaan/surat-peringantan-tunggak-pd/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
