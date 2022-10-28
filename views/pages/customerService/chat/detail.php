<?php

$scope = ' Chat Customer Service';
$action = 'Detail';
$showBack = true;
$backUrl = '/customer-service/chat';
$showEdit = true;

$editUrl = '/customer-service/chat/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
