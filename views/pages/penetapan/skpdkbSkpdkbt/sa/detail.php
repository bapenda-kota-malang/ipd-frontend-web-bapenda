<?php

$scope = ' SA';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/skpdkb-skpdkbt/sa';
$showEdit = true;

$editUrl = '/penetapan/skpdkb-skpdkbt/sa/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
