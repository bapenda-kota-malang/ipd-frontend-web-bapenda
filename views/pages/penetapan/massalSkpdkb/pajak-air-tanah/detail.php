<?php

$scope = ' Penetapan Masal Pajak Air Tanah';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/massal-skpdkb/pajak-air-tanah';
$showEdit = true;
$objekPajak = "pajak-air-tanah";

$editUrl = '/penetapan/massal-skpdkb/pajak-air-tanah/' . $id . '/edit';
$file = __DIR__ . '/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath') . '/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
