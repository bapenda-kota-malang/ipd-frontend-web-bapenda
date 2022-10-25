<?php

$scope = ' Pajak Parkir';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/verifikasi-e-sptpd/pajak-parkir';
$showEdit = true;

$editUrl = '/penetapan/verifikasi-e-sptpd/pajak-parkir/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
