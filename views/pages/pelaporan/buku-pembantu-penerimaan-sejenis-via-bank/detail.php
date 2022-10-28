<?php

$scope = ' Buku Pembantu Penerimaan Sejenis via Bank';
$action = 'Detail';
$showBack = true;
$backUrl = '/pelaporan/buku-pembantu-penerimaan-sejenis-via-bank';
$showEdit = true;

$editUrl = '/pelaporan/buku-pembantu-penerimaan-sejenis-via-bank/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
