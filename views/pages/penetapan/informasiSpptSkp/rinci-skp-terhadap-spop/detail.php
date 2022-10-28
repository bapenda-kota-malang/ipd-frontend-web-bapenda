<?php

$scope = ' Informasi RInci SKP Terhadap SPOP';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/informasi-sppt-skp/rinci-skp-terhadap-spop';
$showEdit = true;

$editUrl = '/penetapan/informasi-sppt-skp/rinci-skp-terhadap-spop/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
