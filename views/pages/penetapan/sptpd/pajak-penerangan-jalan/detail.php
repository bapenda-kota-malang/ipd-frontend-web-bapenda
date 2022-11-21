<?php

$scope = ' SPTPD Pajak Penerangan Jalan';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/sptpd/pajak-penerangan-jalan';
$showEdit = true;
$editUrl = '/penetapan/sptpd/pajak-penerangan-jalan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

$objekPajak = 'pajak-penerangan-jalan';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
