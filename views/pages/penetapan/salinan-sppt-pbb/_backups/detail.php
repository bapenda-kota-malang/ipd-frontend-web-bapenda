<?php

$scope = ' Salinan SPPT PBB';
$action = 'Detail';
$showCancel = false;
$showBack = true;
$backUrl = '/penetapan/salinan-sppt-pbb';
$showEdit = true;

$editUrl = '/penetapan/salinan-sppt-pbb/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
