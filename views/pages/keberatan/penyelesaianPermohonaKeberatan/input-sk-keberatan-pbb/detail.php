<?php

$scope = ' Input SK Keberatan PBB';
$action = 'Detail';
$showBack = true;
$backUrl = '/keberatan/penyelesaian-permohona-keberatan/input-sk-keberatan-pbb';
$showOK = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
