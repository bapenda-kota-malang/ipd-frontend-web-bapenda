<?php

$scope = ' DBKB MEZZANIN';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/dbkb/non-standar/mezzanin';
$showEdit = true;

$editUrl = '/pendataan/dbkb/non-standar/mezzanin/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
