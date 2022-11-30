<?php

$scope = ' Cek Jumlah Transaksi Wajib Pajak';
$action = 'Detail';
$showBack = true;
$backUrl = '/bphtb/jumlah-transaksi-wp';
$showEdit = true;

$editUrl = '/bphtb/jumlah-transaksi-wp/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
