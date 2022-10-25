<?php

$scope = ' Mencetak SK Keberatan';
$action = 'Detail';
$showBack = true;
$backUrl = '/keberatan/penyelesaian-permohona-keberatan/mencetak-sk-keberatan';
$showEdit = true;

$editUrl = '/keberatan/penyelesaian-permohona-keberatan/mencetak-sk-keberatan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
