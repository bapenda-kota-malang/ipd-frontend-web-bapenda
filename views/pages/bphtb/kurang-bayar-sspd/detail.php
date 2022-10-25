<?php

$scope = ' Kurang Bayar SSPD';
$action = 'Detail';
$showBack = true;
$backUrl = '/bphtb/kurang-bayar-sspd';
$showEdit = true;

$editUrl = '/bphtb/kurang-bayar-sspd/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
