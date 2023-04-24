<?php

$scope = ' Update VA satuan';
$action = 'Detail';
$showBack = true;
$backUrl = '/bendahara/update-va-satuan';
$showEdit = true;

$editUrl = '/bendahara/update-va-satuan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
