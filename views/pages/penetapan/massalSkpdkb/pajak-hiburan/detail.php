<?php

$scope = ' Penetapan Masal Pajak Hiburan';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/massal-skpdkb/pajak-hiburan';
$showEdit = true;
$objekPajak = "pajak-hiburan";

$editUrl = '/penetapan/massal-skpdkb/pajak-hiburan/' . $id . '/edit';
$file = __DIR__ . '/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath') . '/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
