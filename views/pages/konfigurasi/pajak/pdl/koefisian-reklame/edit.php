<?php

$scope = ' Koefisien Reklame';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/konfigurasi/pajak/pdl/koefisian-reklame';
$showOK = true;

$file = __DIR__ . '/_components/entryform_insidentil.php';

// get query type is tetap
if (isset($_GET['type']) && $_GET['type'] == 'tetap') {
    $file = __DIR__ . '/_components/entryform_tetap.php';
}

$file_default = Yii::getAlias('@vwCompPath') . '/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
