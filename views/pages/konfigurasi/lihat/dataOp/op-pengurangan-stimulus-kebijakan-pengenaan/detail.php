<?php

$scope = ' OP dengan Pengurangan Stimulus/Kebijakan Pengenaan';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/data-op/op-pengurangan-stimulus-kebijakan-pengenaan';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/data-op/op-pengurangan-stimulus-kebijakan-pengenaan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
