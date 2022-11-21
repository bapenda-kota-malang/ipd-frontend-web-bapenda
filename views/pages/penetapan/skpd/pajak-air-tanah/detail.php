<?php

$scope = ' SKPD Pajak Air Tanah';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/skpd/pajak-air-tanah';
$showEdit = true;

$editUrl = '/penetapan/skpd/pajak-air-tanah/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

$objekPajak = 'pajak-air-tanah';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
