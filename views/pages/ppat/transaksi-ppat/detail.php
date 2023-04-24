<?php
$this->params['container_unset'] = true;
$scope = ' Transaksi PPAT';
$action = 'Detail';
$showBack = true;
$backUrl = '/ppat/transaksi-ppat';
$showEdit = null;

$editUrl = '/ppat/transaksi-ppat/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
