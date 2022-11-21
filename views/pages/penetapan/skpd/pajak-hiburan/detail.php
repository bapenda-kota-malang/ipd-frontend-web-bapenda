<?php

$scope = ' SKPD Pajak Hiburan';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/skpd/pajak-hiburan';
$showEdit = true;

$editUrl = '/penetapan/skpd/pajak-hiburan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

$objekPajak = 'pajak-hiburan';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
