<?php

$scope = ' Tanda Terima SPPT/SKP/STP';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/tanda-terima-sppt-skp-stp';
$showEdit = true;

$editUrl = '/penetapan/tanda-terima-sppt-skp-stp/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
