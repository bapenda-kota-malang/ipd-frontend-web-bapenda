<?php

$scope = ' Penetapan Masal Pajak Parkir';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/massal-skpdkb/pajak-parkir';
$showEdit = true;
$objekPajak = "pajak-parkir";

$editUrl = '/penetapan/massal-skpdkb/pajak-parkir/' . $id . '/edit';
$file = __DIR__ . '/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath') . '/detail/defaultcontent.php';

include __DIR__ . '/_components/header.php';
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
