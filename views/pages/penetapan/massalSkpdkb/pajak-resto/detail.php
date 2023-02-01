<?php

$scope = ' Penetapan Masal Pajak Resto';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/massal-skpdkb/pajak-resto';
$showEdit = true;
$objekPajak = "pajak-resto";

$editUrl = '/penetapan/massal-skpdkb/pajak-resto/' . $id . '/edit';
$file = __DIR__ . '/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath') . '/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
