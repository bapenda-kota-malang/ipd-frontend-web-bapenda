<?php

$scope = ' Tarif Jaminan Bongkat';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/pajak/pdl/tarif-jambong';
$showEdit = true;

$editUrl = '/konfigurasi/pajak/pdl/tarif-jambong/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
