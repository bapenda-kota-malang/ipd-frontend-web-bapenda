<?php

$scope = ' Pembayaran BPHTB';
$action = 'Detail';
$showBack = true;
$backUrl = '/bendahara/pembayaran-bphtb';
$showEdit = true;

$editUrl = '/bendahara/pembayaran-bphtb/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
