<?php

$scope = ' SKPD Pajak Reklame';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/skpd/pajak-reklame';
$showEdit = true;

$editUrl = '/penetapan/skpd/pajak-reklame/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

$objekPajak = 'pajak-reklame';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
