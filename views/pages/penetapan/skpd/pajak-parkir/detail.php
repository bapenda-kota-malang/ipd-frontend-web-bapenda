<?php

$scope = ' SKPD Pajak Parkir';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/skpd/pajak-parkir';
$showEdit = true;

$editUrl = '/penetapan/skpd/pajak-parkir/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

$objekPajak = 'pajak-parkir';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
