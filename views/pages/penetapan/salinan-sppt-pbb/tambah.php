<?php

$scope = ' Salinan SPPT PBB';
$action = 'Tambah';
$showBack = true;
$backUrl = '/penetapan/salinan-sppt-pbb';
$showCancel = null;
$cancelUrl = '/penetapan/salinan-sppt-pbb';
$showOK = null;
$yearTypeMenu = 'common';

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
