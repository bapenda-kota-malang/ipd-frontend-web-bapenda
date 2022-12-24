<?php

$scope = ' Pencatatan SSP PBB';
$action = 'Detail';
$showBack = true;
$backUrl = '/bendahara/pembayaran/pencatatan/ssp-pbb';
$showEdit = true;

$editUrl = '/bendahara/pembayaran/pencatatan/ssp-pbb/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
