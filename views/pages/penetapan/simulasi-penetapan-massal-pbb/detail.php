<?php

$scope = ' Simulasi Penetapan Massal PBB';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/simulasi-penetapan-massal-pbb';
$showEdit = true;

$editUrl = '/penetapan/simulasi-penetapan-massal-pbb/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
