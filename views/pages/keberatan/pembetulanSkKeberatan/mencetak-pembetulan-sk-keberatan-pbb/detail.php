<?php

$scope = ' Mencetak Pembetulan SK Keberatan PBB';
$action = 'Detail';
$showBack = true;
$backUrl = '/keberatan/pembetulan-sk-keberatan/mencetak-pembetulan-sk-keberatan-pbb';
$showEdit = true;

$editUrl = '/keberatan/pembetulan-sk-keberatan/mencetak-pembetulan-sk-keberatan-pbb/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
